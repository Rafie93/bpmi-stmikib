<?php

use App\Models\Menu\AboutMenu;
use App\Models\Menu\DokumenMenu;
use App\Models\Menu\SpmiMenu;

function aboutMenu()
{
    return AboutMenu::all();
}
function dokumenMenu()
{
    return DokumenMenu::all();
}
function spmiMenu()
{
    return SpmiMenu::all();
}
function monevMenu()
{
    return \App\Models\Menu\MonevMenu::all();
}
function akreditasiMenu()
{
    return \App\Models\Menu\AkreditasiMenu::all();
}
