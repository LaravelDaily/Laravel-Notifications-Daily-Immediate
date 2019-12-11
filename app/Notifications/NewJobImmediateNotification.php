<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobImmediateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New job has been posted')
                    ->line('A new job listing has been posted: '.$this->job->title)
                    ->line('Skills: '.implode(", ", $this->job->skills->pluck('name')->toArray()))
                    ->line('Description: '.$this->job->description)
                    ->line('Contact email: '.$this->job->contact_email)
                    ->action('View job', route('admin.jobs.show', $this->job->id))
                    ->line('Thank you for using our application!');
    }
}
