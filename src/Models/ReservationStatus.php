<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 23.03
 */

namespace App\Models;


class ReservationStatus
{
    public const RESERVATION_STATUS_ACTIVE = 'ACTIVE';
    public const RESERVATION_STATUS_CANCELED = 'CANCEL';
    public const RESERVATION_STATUS_FINISHED = 'FINISHED';
}