<?php
/**
 * Created by PhpStorm.
 * User: sviatoslav
 * Date: 5/8/18
 * Time: 7:52 AM
 */

namespace App\Classes;

class RandomData
{
    public static function getPosition($id)
    {
        $pos = array('accountant', 'actor', 'administrator', 'air steward', 'architect', 'artist',
            'assistant', 'auditor', 'personal assistant', 'shop assistant', 'author', 'baker',
            'Bank teller', 'banker', 'barman', 'bricklayer', 'builder', 'businessman',
            'butcher', 'carpenter', 'chef', 'civil servant', 'clerk', 'сloakroom attendant',
            'computer operator', 'software engineering', 'controller', 'cook', 'cosmonaut', 'dancer',
            'decorator', 'dentist', 'designer', 'director', 'company director', 'film director',
            'doctor', 'driver bus', 'garbageman', 'economist', 'editor', 'electrician',
            'makeup artist', 'engineer', 'farmer', 'fisherman', 'fishmonger', 'flight attendant',
            'guard', 'hairdresser', 'head teacher', 'ironworker', 'interpreter', 'jeweler',
            'job', 'journalist', 'judge', 'laborer', 'landscaper', 'lawyer',
            'lecturer', 'librarian', 'loading workman', 'manager', 'merchandiser', 'miner',
            'musician', 'news reader', 'notary public', 'nurse', 'obstetrician', 'oculist',
            'painter', 'photographer', 'pilot', 'plasterer', 'plumber', 'police officer',
            'politician', 'porter', 'prison officer', 'professor', 'prosecutor', 'receptionist',
            'roofer', 'sailor', 'salesman', 'scientist', 'secretary', 'singer',
            'soldier', 'surgeon', 'superviser', 'tailor', 'teacher', 'tiler',
            'telephonist', 'travel agent', 'TV cameraman', 'TV presenter', 'vet', 'yardman',
            'waiter', 'welder', 'work superintendent', 'writer');

        if ($id < count($pos) - 1) {
            return $pos[$id];
        } else {
            return 'Error';
        }
    }
}
