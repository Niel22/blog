cat <<EOF > README.md
# Blog Platform

## Overview  
This Blog Platform is a web application that allows users to create, read, update, and delete blog posts. It features user authentication, a rich text editor, and a clean, responsive design. The platform is built using **HTML**, **CSS**, **JavaScript**, **Bootstrap**, **PHP (Laravel)**, and **MySQL**.

## Features  
### User Features:
- **Homepage:**
  - Hero section showing recent posts based on their trending status.
  - Today's news section.
  - Top news of the week section.
  - Top trending news of all time section.

- **Post Details Page:**
  - Sidebar displaying:
    - All categories.
    - Recent posts.
    - Tags of the viewed post.
    - Related posts.
    - Next and previous posts.
  - Comment section allowing users to comment with their name and email address.

- **Categories:**
  - View categories and see posts under each category.
  
- **Post Search:**
  - Ability to search for posts by keywords.

- **Tags:**
  - Clickable tags that lead to posts related to that tag.



### Dashboard Roles and Features:

1. **Admin Role Features:**
   - **User Management:**
     - Can manage users (Create, Read, Update, Delete users).
     - Assign or remove roles to/from users.
     - Can create, update, and delete user roles.
     - Can create, update, and delete permissions.
     - Assign permissions to different roles.
   
   - **Content Management:**
     - Can create and manage categories.
     - Can create, edit, and delete blog posts.
     - Approve or reject blog posts.
     - Can manage all content on the site.
   
   - **Settings & Profile:**
     - Can access the settings page.
     - Can edit profile details.
     - Can change password.
     - Can delete their account.
     - Can connect and manage social media accounts (Twitter, Facebook, Instagram).
   
   - **Performance Metrics:**
     - View metrics on user registrations.
     - View performance of posts (e.g., how many posts have been made).

2. **Editor Role Features:**
   - **Content Management:**
     - Can view the list of users and categories.
     - Can create posts and publish posts submitted by authors.
     - Posts created by editors are published automatically.
     - Can edit and delete posts (if allowed).
   
   - **Settings & Profile:**
     - Can access settings page.
     - Can edit profile details.
     - Can change password.
     - Can delete their account.
     - Can connect and manage social media accounts (Twitter, Facebook, Instagram).
   
   - **Performance Metrics:**
     - View metrics on posts published by the editor and authors.
     - View the number of users and posts created.

3. **Author Role Features:**
   - **Content Management:**
     - Can create, edit, and delete posts.
     - Posts must be reviewed and published by an editor or admin before being visible on the blog page.
   
   - **Settings & Profile:**
     - Can access settings page.
     - Can edit profile details.
     - Can change password.
     - Can delete their account.
     - Can connect and manage social media accounts (Twitter, Facebook, Instagram).
   
   - **Performance Metrics:**
     - View metrics on how many posts the author has created and how they are performing (once published).

4. **Subscriber Role Features:**
   - **Profile Management:**
     - Can edit their profile details.
     - Can change their password.
     - Can delete their account.
     - Can connect and manage social media accounts (Twitter, Facebook, Instagram).

   - **Performance Metrics:**
     - Can view the content they have interacted with (e.g., liked posts, comments).

### General Features Available to All Roles:
   - **Profile and Settings:**
     - Ability to edit profile details (name, bio, avatar, etc.).
     - Ability to change passwords.
     - Account deletion option.
     - Integration with social media accounts (Twitter, Facebook, Instagram).
   
   - **Filter and Pagination:**
     - Filter content (posts and users) by categories, tags, or other custom filters.
     - Pagination available on post and user pages for easier navigation.

   - **Performance Metrics:**
     - View user growth metrics (how many users have joined over a period).
     - View post performance metrics (number of posts made, views, interactions).

   - **Security:**
     - Multi-role permissions and restrictions for controlling access to specific content and functionality.
     - Role-based access control (RBAC) for different actions on posts and user management.
   
   - **Audit Logs:**
     - Track actions performed by users, including login attempts, profile updates, and content creation.
     - Admin can view audit logs of actions taken by editors, authors, and subscribers.
   
   - **Post & User Management Filters:**
     - Filter posts by status (draft, pending, published).
     - Filter users by roles, registration date, activity, etc.

   - **Social Media Integration:**
     - Users can connect their accounts to social media platforms such as Twitter, Facebook, Instagram.
     - Admin can view and manage social media integrations.
 

### Additional Features:  
- Responsive design for mobile and desktop.  
- Pagination for post lists.  
- Secure authentication (password hashing, CSRF protection).  

## Technologies Used  
### Frontend:  
![](https://img.shields.io/badge/HTML-000000?style=flat&logo=html5&logoColor=E34F26)  
- **HTML**

![](https://img.shields.io/badge/CSS-000000?style=flat&logo=css3&logoColor=1572B6)  
- **CSS**  

![](https://img.shields.io/badge/JavaScript-000000?style=flat&logo=javascript&logoColor=F7DF1E)  
- **JavaScript**  

![](https://img.shields.io/badge/Bootstrap-000000?style=flat&logo=bootstrap&logoColor=563D7C)  
- **Bootstrap**  

### Backend:  
![](https://img.shields.io/badge/PHP-000000?style=flat&logo=php&logoColor=777BB4)  
- **PHP (Laravel Framework)**  

### Database:  
![](https://img.shields.io/badge/MySQL-000000?style=flat&logo=mysql&logoColor=4479A1)  
- **MySQL**  


## Screenshots  
### Admin Dashboard  
![Admin Dashboard](/admin_post_page.png)

### Blog Interface  
![Blog Interface](/interface.png)

## Contribution  
1. Fork the repository.  
2. Create a new branch for your feature/bugfix.  
3. Submit a pull request with a clear description.  

## License  
This project is licensed under the MIT License.

## Credits  
- **Vuexy Bootstrap Template** for the **Admin Dashboard**: [Vuexy Admin Template](https://themeforest.net/item/vuexy-bootstrap-admin-dashboard-template/23328599)  
- **Distro Template** for the **Blog Interface**: [Distro Template](https://themeforest.net/item/distro-bootstrap-blog-website-template/26884235)

