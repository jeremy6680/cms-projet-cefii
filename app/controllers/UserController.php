<?php

use Lib\Validation\UserCreateValidator as UserCreateValidator;
use Lib\Validation\UserUpdateValidator as UserUpdateValidator;
use Lib\Gestion\UserGestion as UserGestion;

class UserController extends BaseController {

    protected $create_validation;
	protected $update_validation;
	protected $user_gestion;

	public function __construct(
		UserCreateValidator $create_validation, 
		UserUpdateValidator $update_validation,
		UserGestion $user_gestion
		)
	{
		parent::__construct();
		$this->beforeFilter('auth');
		$this->create_validation = $create_validation;
		$this->update_validation = $update_validation;
		$this->user_gestion = $user_gestion;
	}

	public function index()
	{
		/*return View::make('users.index', $this->user_gestion->index(4));*/
		
	 	$this->layout->title = 'Liste des utilisateurs';
		$this->layout->main = View::make('dash')->nest('content','users.index',$this->user_gestion->index(4));
	}

	public function create()
	{
		return View::make('users.create');
	}

	public function store()
	{
		if ($this->create_validation->fails()) {
		  return Redirect::route('admin.user.create')
		  ->withInput()
		  ->withErrors($this->create_validation->errors());
		} else {
			$this->user_gestion->store();
			return Redirect::route('admin.user.index')
			->with('ok','L\'utilisateur a bien été créé.');
		}		
	}

	public function show(User $user)
	{
		/*return View::make('users.show',  $this->user_gestion->show($id));*/
		$this->layout->title = 'Fiche utilisateur';
		/*$this->layout->main = View::make('dash')->nest('content','users.show',$this->user_gestion->show($user));*/
		$this->layout->main = View::make('dash')->nest('content', 'users.show', compact('user'));
	}

    public function edit(User $user)
	{
		/*return View::make('users.edit',  $this->user_gestion->edit($id));*/
		$this->layout->title = 'Modifier un utilisateur';
		/*$this->layout->main = View::make('dash')->nest('content','users.edit',$this->user_gestion->edit($id));*/
		$this->layout->main = View::make('dash')->nest('content', 'users.edit', compact('user'));
	}

	public function update($id)
	{
		if ($this->update_validation->fails($id)) {
		  return Redirect::route('admin.user.edit', array($id))
		  ->withInput()
		  ->withErrors($this->update_validation->errors());
		} else {
			$this->user_gestion->update($id);
			return Redirect::route('admin.user.index')
			->with('ok','L\'utilisateur a bien été modifié.');
		}		
	}

	public function destroy($id)
	{
		$this->user_gestion->destroy($id);
		return Redirect::back();
	}

}