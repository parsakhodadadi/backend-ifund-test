<?php

namespace App\DesignPatterns\Proxy\Wallet\Classes;

use App\DesingnPatterns\Proxy\Wallet\Interface\WalletInterface;

class Wallet implements WalletInterface {
    /**
     * @var int[]
     */
    private array $transactions = [];
    private int $depositAccess = 0;

    public function deposit(int $amount)
    {
        $this->transactions[] = $amount;
    }

    public function getBalance(): int
    {
        // this is the heavy part, imagine all the transactions even from
        // years and decades ago must be fetched from a database or web service
        // and the balance must be calculated from it

        return array_sum($this->transactions);
    }

    protected function setAccessToDepositMethod()
    {
        return $this->depositAccess = 1;
    }
}