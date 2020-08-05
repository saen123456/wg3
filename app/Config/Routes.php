<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('UserController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/home', 'UserController::index');
$routes->get('/reset_password', 'UserController::reset_password_page');
$routes->get('/get_otp', 'UserController::get_otp_page');
$routes->get('/confirm_password', 'UserController::confirm_password');
$routes->get('/login', 'UserController::login');
//login
$routes->get('/homepage', 'UserController::homepage');
$routes->get('/profile', 'UserController::profile');
$routes->get('/accounts', 'UserController::Profile_Account');
$routes->get('/logout', 'UserController::User_Logout');
$routes->get('/register', 'UserController::Register');
$routes->get('/teacher', 'UserController::updatetoteacherpage'); //update student to teacher page
//admin
$routes->get('/showuser', 'AdminController::showuser');
$routes->get('/dashboard', 'AdminController::dashboard');
$routes->get('/add', 'AdminController::insert');
$routes->get('/search', 'AdminController::Search');
$routes->get('/chart', 'AdminController::Chart');

//Course
$routes->get('/test55', 'CourseController::Test');
$routes->get('/courses', 'CourseController::Show_Course');
$routes->get('/course', 'CourseController::Add_Course');
$routes->add('/course/createcourse', 'CourseController::CreateCourse');
$routes->get('/alldevelopment', 'CourseController::Category_Course');
//Config-Course
$routes->add('/course/manage/config/(:any)', 'CourseController::CreateCourseStep2/$1');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 */
