<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

include_once "classes/User.php";
include_once "controllers/UserController.php";

final class UserControllerTest extends TestCase
{
    //checks if user_account class exists
    public function testUserClassExists(): void
    {
        $this->assertTrue(class_exists('User'));
    }
    //checks if user_account class creates an instance
    public function testUserAccountClassCreatesDefault(): void
    {
        $this->assertInstanceOf(User::class, new User());
    }
    //checks if user_account class gets user permission
    public function testGetUserPermissionsCtr(): void
    {
        $user_account = new User();
        $app_id = 5;
        $user_id = 1;
        $this->assertIsBool($user_account->get_user_permission_cls($app_id, $user_id));
    }
    //checks if user_account class gets user ID
    public function testGetUserIDCtr(): void
    {
        $user_account = new user_account_class();
        $user_email = "richard.anatsui@ashesi.edu.gh";
        $this->assertIsBool($user_account->get_userID_cls($user_email));
    }
}
