<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Models\FieldValue;
use App\Repository\Contracts\FieldRepositoryInterface;
use App\Repository\Contracts\FieldValueRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreInputField
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        public FieldRepositoryInterface      $fieldRepository,
        public FieldValueRepositoryInterface $fieldValueRepository
    )
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\UserSubscribed $event
     * @return false
     */
    public function handle(UserSubscribed $event)
    {
        if (!isset($event->subscription)) {
            return false;
        }
        $fields = $event->subscription;
        foreach ($fields["inputFields"] as $input) {
            $field = $this->fieldRepository->save($input);

            $data = $input;
            $data["field_id"] = $field->id;

            $value = [
                'subscriber_id' => $fields['id'],
                'field_id' => $field->id,
                'value' => $input['value'],
            ];

            $this->fieldValueRepository->save($value);
        }
    }
}
