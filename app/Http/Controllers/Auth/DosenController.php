<?php
    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class DosenController extends Controller
    {
        public function index() {
            $arrDosen=['Ronal Hadi','Deni S','Fazrol R','Deddy P','Ervan A','Cipto P'];
            return view('akademik.dosen', ['dosen' => $arrDosen]);
        }
    }

?>
