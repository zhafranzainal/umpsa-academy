<?php
namespace Bookly\Lib\Proxy;

use Bookly\Lib;

/**
 * @method static array handleParticipantsChange( array|bool $queue, Lib\Entities\Appointment $appointment ) Handle the change of participants of given appointment.
 * @method static array handleAppointmentFreePlace( array|bool $queue, Lib\Entities\Appointment $appointment ) Handle free places in appointment.
 * @method static array handleFreePlace( array|bool $queue, Lib\Entities\CustomerAppointment $ca ) Handle free places in customer appointment.
 * @method static array canUseFreePlace( Lib\Entities\CustomerAppointment $ca ) Handle free places in appointment.
 */
abstract class WaitingList extends Lib\Base\Proxy
{

}