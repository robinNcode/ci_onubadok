<?php namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Onubadok extends BaseController
{
    /**
     * @param $language
     * @return RedirectResponse
     */
    public function change($language): RedirectResponse
    {
        session()->set('language', $language);
        return redirect()->back();
    }
}
