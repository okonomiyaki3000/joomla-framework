<?php
/**
 * Part of the Joomla Framework GitHub Package
 *
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Github\Package\Repositories;

use Joomla\Github\Package;

/**
 * GitHub API Forks class for the Joomla Framework.
 *
 * @documentation http://developer.github.com/v3/repos/keys
 *
 * @since  1.0
 */
class Keys extends Package
{
	/**
	 * List keys in a repository.
	 *
	 * @param   string  $owner  The name of the owner of the GitHub repository.
	 * @param   string  $repo   The name of the GitHub repository.
	 *
	 * @since 1.0
	 *
	 * @return object
	 */
	public function getList($owner, $repo)
	{
		// Build the request path.
		$path = '/repos/' . $owner . '/' . $repo . '/keys';

		return $this->processResponse(
			$this->client->get($this->fetchUrl($path))
		);
	}

	/**
	 * Get a key.
	 *
	 * @param   string   $owner  The name of the owner of the GitHub repository.
	 * @param   string   $repo   The name of the GitHub repository.
	 * @param   integer  $id     The id of the key.
	 *
	 * @since 1.0
	 *
	 * @return object
	 */
	public function get($owner, $repo, $id)
	{
		// Build the request path.
		$path = '/repos/' . $owner . '/' . $repo . '/keys/' . (int) $id;

		return $this->processResponse(
			$this->client->get($this->fetchUrl($path))
		);
	}

	/**
	 * Create a key.
	 *
	 * @param   string  $owner  The name of the owner of the GitHub repository.
	 * @param   string  $repo   The name of the GitHub repository.
	 * @param   string  $title  The key title.
	 * @param   string  $key    The key.
	 *
	 * @since 1.0
	 *
	 * @return object
	 */
	public function create($owner, $repo, $title, $key)
	{
		// Build the request path.
		$path = '/repos/' . $owner . '/' . $repo . '/keys';

		$data = array(
			'title' => $title,
			'key'   => $key
		);

		return $this->processResponse(
			$this->client->post($this->fetchUrl($path), json_encode($data)),
			201
		);
	}

	/**
	 * Edit a key.
	 *
	 * @param   string   $owner  The name of the owner of the GitHub repository.
	 * @param   string   $repo   The name of the GitHub repository.
	 * @param   integer  $id     The id of the key.
	 * @param   string   $title  The key title.
	 * @param   string   $key    The key.
	 *
	 * @since 1.0
	 *
	 * @return object
	 */
	public function edit($owner, $repo, $id, $title, $key)
	{
		// Build the request path.
		$path = '/repos/' . $owner . '/' . $repo . '/keys/' . (int) $id;

		$data = array(
			'title' => $title,
			'key'   => $key
		);

		return $this->processResponse(
			$this->client->patch($this->fetchUrl($path), json_encode($data))
		);
	}

	/**
	 * Delete a key.
	 *
	 * @param   string   $owner  The name of the owner of the GitHub repository.
	 * @param   string   $repo   The name of the GitHub repository.
	 * @param   integer  $id     The id of the key.
	 *
	 * @since 1.0
	 *
	 * @return boolean
	 */
	public function delete($owner, $repo, $id)
	{
		// Build the request path.
		$path = '/repos/' . $owner . '/' . $repo . '/keys/' . (int) $id;

		$this->processResponse(
			$this->client->delete($this->fetchUrl($path)),
			204
		);

		return true;
	}
}