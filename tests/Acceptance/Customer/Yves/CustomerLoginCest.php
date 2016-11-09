<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerLoginPage;
use Acceptance\Customer\Yves\PageObject\CustomerOverviewPage;
use Acceptance\Customer\Yves\PageObject\CustomerPasswordForgottenPage;
use Acceptance\Customer\Yves\Tester\CustomerLoginTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerLoginCest
 */
class CustomerLoginCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanOpenLoginPage(CustomerLoginTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->see(CustomerLoginPage::TITLE_LOGIN, 'h4');
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanOpenForgotPasswordPage(CustomerLoginTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->click(CustomerLoginPage::FORGOT_PASSWORD_LINK);
        $i->seeCurrentUrlEquals(CustomerPasswordForgottenPage::URL);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanLoginWithValidData(CustomerLoginTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->haveRegisteredCustomer(CustomerLoginPage::NEW_CUSTOMER_EMAIL);
        $i->submitLoginForm();
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);
    }

}
