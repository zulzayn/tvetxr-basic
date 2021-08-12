<p align="center"><a href="https://tvetxr.ga/" target="_blank"><img src="https://gitlab.com/zulwaqarzain96/tvetxr/-/raw/master/public/img/TVETXRlogo.png" width="400"></a></p>

<p align="center">
<a href="https://gitlab.com/ImranShamm/hse-magicx/-/pipelines"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## REQUIREMENT
This installation is intended to be used with laragon that comes with preinstall tools needed for the project for local development environment. For other ways the requirement is still the same but you need to configure them yourself.

Just make sure that your Laragon run with below Environment
- PHP >= 7.4
- MySQL 5.7
- Apache 2.4
- Node v12

## INSTALLATION STEPS

### To Run Web System

**1) Clone**
- SSH : `git clone git@gitlab.com:zulzayn/tvetxr-basic.git`
- HTTPS : `git clone https://gitlab.com/zulzayn/tvetxr-basic.git`

**2) run - `composer install`**

**3) Copy .env.example file and rename to .env** 

_For database:-_
- change `DB_DATABASE=dev_elearning`

**5) run - `php artisan key:generate`**

**6) run - `php artisan storage:link`**

**7) Create database - dev_elearning**

**8) run - `php artisan migrate`**

**9) run - `php artisan db:seed --class=UserSeeder`**

**10) You`re Good to go! Run the system and input below credential:-**

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Username** : _admin@mail.com_

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Password** : _123456_

