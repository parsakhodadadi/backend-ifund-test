<?php

namespace App\DesingnPatterns\Proxy\Wallet;

namespace App\DesingnPatterns\Proxy\Wallet\Interface;
use App\DesignPatterns\Proxy\Wallet\Classes\Wallet;
use App\DesingnPatterns\Proxy\Wallet\Interface\WalletInterface;

class WalletProxy extends Wallet implements WalletInterface
{
    private ?int $balance = null;
    private int $depositAccess = 0;

    public function getBalance(): int
    {
        // because calculating balance is so expensive,
        // the usage of BankAccount::getBalance() is delayed until it really is needed
        // and will not be calculated again for this instance

        if ($this->depositAccess == 1) {
            if ($this->balance === null) {
                $this->balance = parent::getBalance();
            }

            return $this->balance;
        } else {
            return 0;
        }
    }

    public function checkDepositAccess()
    {
        if ($this->depositAccess === 0) {
            $this->depositAccess = parent::setAccessToDepositMethod();
        }
    }
}