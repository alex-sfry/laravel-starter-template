<?php

declare(strict_types=1);

namespace Tests\Functional\Auth;

use Tests\Support\FunctionalTester;

final class SignupCest
{
    public function _before(FunctionalTester $I): void
    {
        // Code here will be executed before each test.
    }

    public function signupCreatesUser(FunctionalTester $I)
    {
        $I->amOnPage('/auth/signup');

        $this->formElementsExist($I);

        $I->fillField(['name' => 'username'], 'alex8078');
        $I->fillField(['name' => 'email'], 'aaa@aaa.ab');
        $I->fillField(['name' => 'password'], 'qwerty');
        $I->fillField(['name' => 'password_confirmation'], 'qwerty');

        $I->click('Submit');
        $I->seeCurrentUrlEquals('/');
    }

    public function signupValidationFails(FunctionalTester $I)
    {
        $I->amOnPage('/auth/signup');
        $this->formElementsExist($I);

        $I->click('Submit');

        $I->seeElement('#username.is-invalid');
        $I->seeElement('#email.is-invalid');
        $I->seeElement('#password.is-invalid');
        $I->seeElement('#password_confirmation.is-invalid');

        $I->amOnPage('/auth/signup');
        $this->formElementsExist($I);

        $I->fillField(['name' => 'username'], 'alex8078');
        $I->fillField(['name' => 'email'], 'aaa@aaa.ab');
        $I->fillField(['name' => 'password'], 'qwerty');
        $I->fillField(['name' => 'password_confirmation'], 'qwert');

        $I->click('Submit');

        $I->dontSeeElement('#username.is-invalid');
        $I->dontSeeElement('#email.is-invalid');
        $I->seeElement('#password.is-invalid');
        $I->seeElement('#password_confirmation.is-invalid');

        $I->amOnPage('/auth/signup');
        $this->formElementsExist($I);

        $I->fillField(['name' => 'username'], 'alex8078');
        $I->fillField(['name' => 'email'], 'aaa');
        $I->fillField(['name' => 'password'], 'qwerty');
        $I->fillField(['name' => 'password_confirmation'], 'qwerty');

        $I->click('Submit');

        $I->dontSeeElement('#username.is-invalid');
        $I->seeElement('#email.is-invalid');
        $I->dontSeeElement('#password.is-invalid');
        $I->dontSeeElement('#password_confirmation.is-invalid');

        $I->amOnPage('/auth/signup');
        $this->formElementsExist($I);

        $I->fillField(['name' => 'username'], 'alex8078');
        $I->fillField(['name' => 'password'], 'qwerty');
        $I->fillField(['name' => 'password_confirmation'], 'qwerty');

        $I->click('Submit');

        $I->dontSeeElement('#username.is-invalid');
        $I->seeElement('#email.is-invalid');
        $I->dontSeeElement('#password.is-invalid');
        $I->dontSeeElement('#password_confirmation.is-invalid');

        $I->amOnPage('/auth/signup');
        $this->formElementsExist($I);

        $I->fillField(['name' => 'email'], 'aaa@aaa.ab');
        $I->fillField(['name' => 'password'], 'qwerty');
        $I->fillField(['name' => 'password_confirmation'], 'qwerty');

        $I->click('Submit');

        $I->seeElement('#username.is-invalid');
        $I->dontSeeElement('#email.is-invalid');
        $I->dontSeeElement('#password.is-invalid');
        $I->dontSeeElement('#password_confirmation.is-invalid');
    }

    private function formElementsExist(FunctionalTester $I)
    {
        $I->seeElement('input#username');
        $I->seeElement('input#email');
        $I->seeElement('input#password');
        $I->seeElement('input#password_confirmation');
        $I->seeElement('button[type="submit"]');
    }
}
