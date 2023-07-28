<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function nameWithId()
    {
        return Company::select('id', 'name')
        ->orderby('name', 'asc')
        ->get();
    }

    public function withNumOfContact()
    {
        // [1 => 'Company 1 (1)', ...]
        $data = [];
        $companies = Company::select('id', 'name')->orderby('name', 'asc')->get();

        foreach ($companies as $company) {
            $data[$company->id] = $company->name . " (" . $company->contact()->count() .")";
        }

        return $data;
    }
}
