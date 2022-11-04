<?php

use App\Models\User;

function me(): ?User {
    return User::me();
}
