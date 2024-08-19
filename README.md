# ClockLize - A simple attendance system

<img src="/public/assets/img/logo.webp" alt="logo" width="50" height="50" />

![image](/public/assets/img/thumbnail.png)

### Installation and Setup

- Clone the repo
- Copy `.env.example` to `.env`
- Run `composer install` or `composer update`
- Create a database and update `.env` file with database credentials
- Run `php artisan migrate --seed`
- Config `APP_URL` in `.env` file
- Run `php artisan serve`
- Visit your served in your browser

### Features

There are two types of users in the system: Admin and User.

#### Admin Features

- **Dashboard**
- **User Management**
    - Add new User
    - Users List
    - Edit User
    - Delete User
- **Monthly Report**
- **Attendance Records**
    - Here can see the attendance records of the current month & then you can see records by selecting the month
- **Profile**
- **Security** (Here you've to confirm your password to change your password)
    - Change Password
- **Logout**

#### User Features

- **Dashboard**
    - Here can see calendar view of attendance and can mark attendance by clicking on the date
- **Attendance Records**
    - Here can see the attendance records of the current month & then you can see records by selecting the month
- **Profile**
- **Security** (Here you've to confirm your password to change your password)
    - Change Password
- **Logout**

### Gallery

| <img src="/public/assets/img/galleries/image1.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image2.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image3.png" alt="logo" width="600" height="300" /> |
|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|
|                                    **Admin Dashboard**                                    |                                  **User Add/Edit Page**                                   |                                       **User List**                                       |

| <img src="/public/assets/img/galleries/image4.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image5.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image6.png" alt="logo" width="600" height="300" /> |
|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|
|                              **Admin Users Monthly Reports**                              |                                     **Profile Page**                                      |                                 **Password Update Page**                                  |

| <img src="/public/assets/img/galleries/image7.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image9.png" alt="logo" width="600" height="300" /> | <img src="/public/assets/img/galleries/image8.png" alt="logo" width="600" height="300" /> |
|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|:-----------------------------------------------------------------------------------------:|
|                                     **Logout Modal**                                      |                        **User Dashboard (Attendance Entry Page)**                         |                                **User Attendance Report**                                 |

#### Credentials

- Admin:
-
    - Email: `admin@app.com`
    - Password: `password`
- Member:
-
    - Email: `member@app.com`
    - Password: `password`

<h1 align="center">
** Thank you **
</h1>