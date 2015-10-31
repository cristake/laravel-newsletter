<?php namespace Spatie\Newsletter\Interfaces;

/**
 * Interface NewsletterCampaign.
 */
interface NewsletterCampaignInterface
{
    /**
     * Create a new newsletter campaign.
     *
     * @param $list
     * @param $subject
     * @param $content
     *
     * @return mixed
     */
    public function create($list, $subject, $content);

    /**
     * Send a test newsletter campaign.
     *
     * @param $list
     * @param $subject
     * @param $content
     *
     * @return mixed
     */
    public function sendTest($cid, $emails, $send_type);

    /**
     * Send a newsletter campaign.
     *
     * @param $list
     * @param $subject
     * @param $content
     *
     * @return mixed
     */
    public function send($cid);

    /**
     * Delete a new newsletter campaign.
     *
     * @param $cid
     *
     * @return mixed
     */
    public function delete($cid);
}
