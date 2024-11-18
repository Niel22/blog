<div>
    @include('livewire.users.home.hero')

    <!-- Home grid section -->
    @if($recent_posts->count() > 0)
        @include('livewire.users.home.today')
    @endif
    <!-- Home main right -->

    @if($top_of_week != null)
    @include('livewire.users.home.top-of-week')
    @endif


    @include('livewire.users.home.trending')
</div>