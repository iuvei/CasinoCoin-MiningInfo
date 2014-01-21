
<p align="center"><img src="https://raw.github.com/transcoder/CasinoCoin/master/src/qt/res/images/logo.png" /></p>

CasinoCoin: An open source, peer-to-peer Internet currency specifically designed for online casino gaming.

<p align="center"><img src="https://raw.github.com/transcoder/CasinoCoin/master/src/qt/res/images/casinocoin-coin.png" /></p>

CasinoCoin-MiningInfo
=====================
A PHP class that pulls the latest CasinoCoin mining and network related statistics such as difficulty, current block number and network hashrate.

You will need to have the CasinoCoin server daemon running in the background. The PHP class connects to the CasinoCoin daemon via a JSON RPC call to pull CasinoCoin statistics. 

Modify \lib\CasinoCoinMiningInfo\inc-settings.php and set <b>CASINOCOIN_RPC_USERNAME</b> and <b>CASINOCOIN_RPC_PASSWORD</b> to match your CasinoCoin casinocoin.conf settings.


Sample Result Set
=================
Array
(
    [version] => 1000004
    [difficulty] => 1.97454052
    [blocks] => 197448
    [networkhashps] => 59232316
)

A test example can be found at \test\mininginfo.php

Source: https://github.com/transcoder/CasinoCoin-MiningInfo


