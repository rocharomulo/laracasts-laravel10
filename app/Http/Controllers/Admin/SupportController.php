<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // construtor (cria um objeto do tipo service)
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
dd($supports);
        // envia para a view a listagem de suportes função "compact" cria um índice no array com o mesmo nome da variável
        return view('admin/supports/index',compact ('supports'));
    }

    public function show(string $id) {
        // Support::where('id',$id)->first();
        // Support::where('id','=',$id)->first();
        $support = Support::find($id);

        // se retornou nulo (id não encontrado) retorna para a página anterior
        if (!$support = $this->service->findOne($id))
            return back();

        return view('admin/supports/show',compact('support'));
    }

    public function create() {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support) {

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit (string $id) {

        // busca o suporte referente ao id na tabela de suportes, se nulo, retorna para página anterior
        // if (!$support = $support->where('id',$id)->first())
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports.edit',compact('support'));
    }

    public function update (StoreUpdateSupport $request, Support $support, string $id) {

        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request),
        );

        if (!$support)
            return back();

        return redirect()->route('supports.index');

    }

    public function destroy(string $id) {

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
