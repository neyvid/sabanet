<?php


namespace App\Services\CalculateTotalPrice;


class calculateTotalPrice
{
    public static function calculateTotalPrice($service, array $equipments = [])
    {
//        dd($equipment['net-equ']);
        $priceOfService = $service->price;
        $priceOfEquipment = 0;
        $discountOfEquipment = 0;
        if (!is_null($equipments)) {
            foreach ($equipments as $equipment) {
                $priceOfEquipment += $equipment->price;
                $discountOfEquipment += ($equipment->price * $equipment->discount) / 100;
            }
        };
        $totalPrice = $priceOfService + $priceOfEquipment;
        $taxAmount = (($totalPrice * 9) / 100);
        $discountOfService = ($priceOfService * $service->discount) / 100;
        $totalPayablePrice = ($totalPrice - $discountOfService - $discountOfEquipment) + $taxAmount;
        return ['totalPrice' => $totalPrice, 'totalPayablePrice' => $totalPayablePrice, 'discountOfService' => $discountOfService, 'discountOfEquipment' => $discountOfEquipment, 'taxAmount' => $taxAmount];
    }

    public static function checkIsEquipmentInOrder()
    {

        $equpments=[];
        if (session()->has('net-equ')) {
            $equpments['net-equ'] = session()->get('net-equ');
        }
        if (session()->has('pc-equ')) {
            $equpments['pc-equ'] = session()->get('pc-equ');
        }
        return $equpments;
    }
}
