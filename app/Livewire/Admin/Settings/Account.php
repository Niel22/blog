<?php

namespace App\Livewire\Admin\Settings;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Account extends Component
{
    use WithFileUploads;

    public $image;
    public $phone_no, $gender, $address, $state, $country;
    public $delete = false;

    protected $rules = [
        'address' => ['required', 'string'],
        'state' => ['required', 'string'],
        'country' => ['required', 'string'],
        'gender' => ['required', 'string']
    ];

    public function toggleDeleteAccount()
    {
        $this->delete = !$this->delete;
    }

    public function deleteAccount($id)
    {

        if ($this->delete) {
            $user = User::find(Auth::user()->id);

            $user->delete();

            $this->delete = false;
            session()->invalidate();

            session()->regenerateToken();

            return redirect('/');
        }

        return;
    }


    public function mount()
    {
        $user = UserDetails::where('user_id', Auth::user()->id)->first();

        if ($user) {
            $this->phone_no = $user->phone_no;
            $this->address = $user->address;
            $this->state = $user->state;
            $this->country = $user->country;
            $this->gender = $user->gender;
        }
    }

    public function updated()
    {
        if ($this->image != null) {
            $data = (object) $this->validate([
                "image" => ['image', 'mimes:jpg,jpeg,jpg'],
            ]);

            $imageInstance = Image::read($this->image->getRealPath());


            $imageInstance->cover(100, 100);
            $filename = time() . '.' . $this->image->getClientOriginalExtension();
            $path = 'uploads/profile';
            $imageInstance->save($data->image->getRealPath());

            $data->image = $this->image->storeAs($path, $filename, 'public');

            $user = UserDetails::where('user_id', Auth::id())->first();

            if ($user) {
                if (file_exists(public_path('storage/' . $user->image))) {
                    unlink(public_path('storage/' . $user->image));
                }

                $user->update([
                    'image' => $data->image,
                ]);

                session()->flash('success', 'Profile picture uploaded');
            } else {

                UserDetails::create([
                    'user_id' => Auth::id(),
                    'image' => $data->image
                ]);

                session()->flash('success', 'Profile picture uploaded');
            }

            $this->reset(['image']);
        }
    }

    public function updateDetails()
    {
        $details = (object) $this->validate();

        $user = UserDetails::where('user_id', Auth::user()->id)->first();

        if ($user) {
            if ($user->phone_no !== null) {
                $user->update([
                    'address' => $details->address,
                    'state' => $details->state,
                    'country' => $details->country,
                    'gender' => $details->gender
                ]);
            } else {

                $data = $this->validate([
                    'phone_no' => ['required', 'string', 'unique:user_details,phone_no'],
                ]);

                $details->phone_no = $data['phone_no'];

                $user->update([
                    'phone_no' => $details->phone_no,
                    'address' => $details->address,
                    'state' => $details->state,
                    'country' => $details->country,
                    'gender' => $details->gender
                ]);
            }

            session()->flash('success', 'Profile Updated');
        } else {
            UserDetails::create([
                'phone_no' => $details->phone_no,
                'address' => $details->address,
                'state' => $details->state,
                'country' => $details->country,
                'gender' => $details->gender
            ]);

            session()->flash('success', 'Profile Updated');
        }
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        return view('livewire.admin.settings.account');
    }
}
