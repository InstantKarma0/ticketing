<?php

namespace App\Tests;

use App\User\src\DataFixtures\UserFixtures;
use App\User\src\Entity\User;
use App\User\src\Entity\UserProfile;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    protected AbstractDatabaseTool $databaseTool;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $container = static::getContainer();

        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();

        // Load the User fixtures and the dependencies
        $this->databaseTool->loadFixtures([
            UserFixtures::class,
        ]);

    }

    public function testLogin(): void
    {
        // Denied - Can't login with invalid email address.
        $this->client->request('GET', '/');
        self::assertResponseIsSuccessful();

        $this->client->submitForm('Sign in', [
            '_username' => 'doesNotExist@example.com',
            '_password' => 'password',
        ]);

        self::assertResponseRedirects('/');
        $this->client->followRedirect();

        // Ensure we do not reveal if the user exists or not.
        self::assertSelectorTextContains('.alert-danger', 'Invalid credentials.');

        // Denied - Can't login with invalid password.
        $this->client->request('GET', '/');
        self::assertResponseIsSuccessful();

        $this->client->submitForm('Sign in', [
            '_username' => 'john.doe@test.fr',
            '_password' => 'bad-password',
        ]);

        self::assertResponseRedirects('/');
        $this->client->followRedirect();

        // Ensure we do not reveal the user exists but the password is wrong.
        self::assertSelectorTextContains('.alert-danger', 'Invalid credentials.');

        // Success - Login with valid credentials is allowed.
        $this->client->submitForm('Sign in', [
            '_username' => 'john.doe@test.fr',
            '_password' => '123456789',
        ]);

        self::assertResponseRedirects('/home');
        $this->client->followRedirect();

        self::assertSelectorNotExists('.alert-danger');
        self::assertResponseIsSuccessful();
    }
}
