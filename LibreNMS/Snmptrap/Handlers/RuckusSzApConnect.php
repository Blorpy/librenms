<?php
/**
 * RuckusSzApConnect.php
 *
 * -Description-
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Ruckus ruckusSZAPConnectedTrap is sent when an access point connects
 * to a Smartzone controller.
 *
 * @link       http://librenms.org
 * @copyright  2019 KanREN, Inc.
 * @author     Heath Barnhart <hbarnhart@kanren.net>
 */

namespace LibreNMS\Snmptrap\Handlers;

use App\Models\Device;
use LibreNMS\Interfaces\SnmptrapHandler;
use LibreNMS\Snmptrap\Handlers\RuckusSzSeverity;
use LibreNMS\Snmptrap\Trap;
use Log;

class RuckusSzApConnect implements SnmptrapHandler
{
    /**
     * Handle snmptrap.
     * Data is pre-parsed and delivered as a Trap.
     *
     * @param Device $device
     * @param Trap $trap
     * @return void
     */
    public function handle(Device $device, Trap $trap)
    {
        $location = $trap->getOidData($trap->findOid('RUCKUS-SZ-EVENT-MIB::ruckusSZEventAPLocation'));
        $reason = $trap->getOidData($trap->findOid('RUCKUS-SZ-EVENT-MIB::ruckusSZEventReason'));
        $severity = RuckusSzSeverity::getSeverity($trap->getOidData($trap->findOid('RUCKUS-SZ-EVENT-MIB::ruckusSZEventSeverity')));
        Log::event("AP at location $location has connected to the SmartZone with reason $reason", $device->device_id, 'trap', $severity);
    }
}
