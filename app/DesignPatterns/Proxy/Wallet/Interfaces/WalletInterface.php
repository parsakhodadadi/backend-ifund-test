<?php

namespace App\DesingnPatterns\Proxy\Wallet\Interface;

interface WalletInterface
{
    public function deposit(int $amount);

    public function getBalance(): int;
}
