<?php

namespace App\Scopes;

class CompanySearchScope extends  SearchScope
{
    protected $searchColumns = ['name', 'address', 'email', 'website'];
}
