<?php

namespace DntApi;

use DntLibrary\App\SendGrid;

class SendMailApi extends BaseApiController
{
    protected string $fromEmail = '';
    protected string $fromName = '';
    protected string $toEmail = '';
    protected string $subject = '';
    protected string $content = '';

    /**
     * Prepare email data from request
     */
    protected function prepare(): void
    {
        $this->fromEmail = urldecode($this->rest->get('fromEmail') ?: '');
        $this->fromName = urldecode($this->rest->get('fromName') ?: '');
        $this->toEmail = urldecode($this->rest->get('toEmail') ?: '');
        $this->subject = urldecode($this->rest->get('subject') ?: '');
    }

    /**
     * Generate email content
     */
    protected function generateContent(string $confirmUrl): void
    {
        $this->content = '<html><body><h2>Confirm data</h2><p><a href="' . htmlspecialchars($confirmUrl) . '">Confirm</a></p></body></html>';
    }

    /**
     * Send email via SendGrid
     */
    protected function sendViaSendGrid(string $toEmail, string $subject, string $content, string $fromEmail = '', string $fromName = ''): array
    {
        if (!defined('SEND_GRID_API_KEY') || empty(SEND_GRID_API_KEY)) {
            return ['success' => false, 'error' => 'SendGrid API key not configured'];
        }

        $sendGrid = new SendGrid();
        return $sendGrid->send([
            'to' => $toEmail,
            'from' => $fromEmail ?: (defined('SEND_EMAIL_FROM') ? SEND_EMAIL_FROM : ''),
            'from_name' => $fromName ?: (defined('SEND_EMAIL_FROM_NAME') ? SEND_EMAIL_FROM_NAME : ''),
            'subject' => $subject,
            'content' => $content,
        ]);
    }

    /**
     * Main run method
     */
    public function run(): void
    {
        $this->prepare();

        // Validate required fields
        if (!$this->validateRequired(['toEmail', 'subject'], [
            'toEmail' => $this->toEmail,
            'subject' => $this->subject,
        ])) {
            return;
        }

        $domain = $this->rest->get('confirmUrl') ?: '';
        $confirmUrl = $domain . '?signature=' . urlencode($this->rest->get('signature') ?: '') 
            . '&time_signature=' . urlencode($this->rest->get('time_signature') ?: '') 
            . '&round_id=' . urlencode($this->rest->get('round_id') ?: '');
       
        $this->generateContent($confirmUrl);

        $result = $this->sendViaSendGrid(
            $this->toEmail,
            $this->subject,
            $this->content,
            $this->fromEmail,
            $this->fromName
        );

        if ($result['success']) {
            $this->successResponse(['message_id' => $result['message_id'] ?? null], 'Email sent successfully');
        } else {
            $this->errorResponse($result['error'] ?? 'Failed to send email', 500);
        }
    }
}
