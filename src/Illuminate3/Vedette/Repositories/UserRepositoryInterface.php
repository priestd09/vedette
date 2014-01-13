<?php namespace Illuminate3\Vedette\Repositories;

/**
 * User Repository Interface
 */
interface UserRepositoryInterface {


public function findAll();

public function findById($id);

public function create($input);

public function update($input);

public function destroyById($id);


public function all();

public function find($id);

public function delete($id);

	/**
	 * Get an activation code for the given user.
	 *
	 * @return string
	 */
	public function getActivationCode($user);

	/**
	 * Set the user confirmation to true.
	 *
	 * @param string $code
	 * @return bool
	 */
	public function confirmToken($token);

/**
* Save user
*
* @param  array  $attributes [description]
* @param  mixed $user null or User
* @return mixed boolean false or User
*/
public function save(array $attributes, $user = null);


}