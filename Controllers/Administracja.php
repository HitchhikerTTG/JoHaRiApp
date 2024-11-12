namespace App\Controllers;

use App\Models\OknoModel;

class Administracja extends BaseController {

    public function pusteOkna() {
        $oknoModel = new OknoModel();
        $pusteOkna = $oknoModel->getEmptyWindows();

        $data = [
            'title' => 'Puste Okna',
            'pusteOkna' => $pusteOkna
        ];

        return view('administracja/puste_okna', $data);
    }
}