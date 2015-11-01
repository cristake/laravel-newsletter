<?php

namespace Spatie\Newsletter\Test\MailChimp;

use Mockery;
use PHPUnit_Framework_TestCase;
use Spatie\Newsletter\MailChimp\Newsletter;

class NewsletterTest extends PHPUnit_Framework_TestCase
{

    protected $campaign;
    protected $list;
    protected $newsletter;

    public function setUp()
    {
        $this->campaign = Mockery::mock('Spatie\Newsletter\MailChimp\NewsletterCampaign');
        $this->list = Mockery::mock('Spatie\Newsletter\MailChimp\NewsletterList');

        $this->newsletter = new Newsletter($this->campaign, $this->list);
    }

    /**
     * @test
     */
    public function it_can_subscribe_an_email_adress_to_a_list()
    {
        $this->list->shouldReceive('subscribe')->with('freek@spatie.be',['firstName'=>'Freek', 'lastName'=>'Van der Herten'], 'testlist');

        $this->newsletter->subscribe('freek@spatie.be', ['firstName'=>'Freek', 'lastName'=>'Van der Herten'], 'testlist');
    }

    /**
     * @test
     */
    public function it_can_update_a_member_subscibed_to_a_list()
    {
        $this->list->shouldReceive('updateMember')->with('freek@spatie.be',['firstName'=>'Freek', 'lastName'=>'Van der Herten'], 'testlist');

        $this->newsletter->updateMember('freek@spatie.be', ['firstName'=>'Freek', 'lastName'=>'Van der Herten'], 'testlist');
    }

    /**
     * @test
     */
    public function it_can_unsubscribe_an_email_address_from_a_list()
    {
        $this->list->shouldReceive('unsubscribe')->with('freek@spatie.be', 'testlist');

        $this->newsletter->unsubscribe('freek@spatie.be', 'testlist');
    }

    /**
     * @test
     */
    public function it_can_create_a_campaign()
    {
        $this->campaign->shouldReceive('create')->with('subject', 'content', 'testlist');

        $this->newsletter->createCampaign('subject', 'content', 'testlist');
    }

   /**
     * @test
     */
    public function it_can_delete_a_campaign()
    {
        $this->campaign->shouldReceive('delete')->with('cid');

        $this->newsletter->deleteCampaign('cid');
    }

   /**
     * @test
     */
    public function it_can_send_a_test_campaign()
    {
        $this->campaign->shouldReceive('sendTest')->with('cid', 'emails', 'sendType');

        $this->newsletter->sendTestCampaign('cid', 'emails', 'sendType');
    }

   /**
     * @test
     */
    public function it_can_send_a_campaign()
    {
        $this->campaign->shouldReceive('send')->with('cid');

        $this->newsletter->sendCampaign('cid');
    }
}