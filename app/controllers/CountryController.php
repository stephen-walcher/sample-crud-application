<?php
/**
 * Countries Listing
 *
 * Controller for handling the general CRUD functions of the `country` table
 *
 * @package Walcher
 * @subpackage Kinetic
 * @author Stephen Walcher <stephenwalcher@gmail.com>
 */

class CountryController extends Controller {

    /**
     * List all countries
     *
     * @returns View Country listing view
     */
    protected function displayCountries()
    {
        $data['countries'] = Country::all();

        return View::make('countries.list', $data);
    }

    /**
     * Display form for adding a new country
     *
     * @returns View Country add view
     */
    protected function displayAdd()
    {
        // Return the blank record view
        return View::make('countries.record');
    }

    /**
     * Process POST request to add a new country to the database
     *
     * @returns Redirect Redirection to Country Listing
     */
    protected function processAdd()
    {
        // Get POST info into an array
        $info = Input::all();

        // Set up validator with rules
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'continent' => 'required',
            'population' => 'required',
            'head_of_state' => 'required'
        ];

        $validator = Validator::make($info, $rules);

        // Validate POST info
        if ($validator->fails()) {
            Former::withErrors($validator);

            return View::make('countries.record');

        } else {
            // Create a new country model
            $country = new Country;

            // Populate fields with provided info
            $country->name = $info['name'];
            $country->code = $info['code'];
            $country->continent = $info['continent'];
            $country->population = $info['population'];
            $country->head_of_state = $info['head_of_state'];

            // Add the country to the database
            $country->save();

            // Back to countries list
            return Redirect::to('countries');
        }
    }

    /**
     * Display form for editing a new country and populate with record based
     * on provided ID
     *
     * @param int ID value of the record to populate
     *
     * @returns View Populated country edit view
     */
    protected function displayEdit($id = false)
    {
        // Check if id has been provided and is valid
        if ($id === false && preg_match('/^[0-9]+$/', $id) == 0) {
            App::abort(403, 'Invalid or no ID value provided.');
        }

        // Grab the requested Country record
        $data['country'] = Country::find($id);

        // Populate the Former object for form creation
        Former::populate($data['country']);

        // Return view with bound data
        return View::make('countries.record', $data);
    }

    /**
     * Process POST request to edit a country based on provided ID
     *
     * @param int ID value of the record to edit
     *
     * @returns Redirect Redirection to Country Listing
     */
    protected function processEdit($id = false)
    {
        // Check if id has been provided and is valid
        if ($id === false && preg_match('/^[0-9]+$/', $id) == 0) {
            App::abort(403, 'Invalid or no ID value provided.');
        }

        // Get POST info into an array
        $info = Input::all();

        // Set up validator with rules
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'continent' => 'required',
            'population' => 'required',
            'head_of_state' => 'required'
        ];

        $validator = Validator::make($info, $rules);

        // Validate POST info
        if ($validator->fails()) {
            Former::withErrors($validator);

            // Grab the requested Country record
            $data['country'] = Country::find($id);

            // Populate the Former object for form creation
            Former::populate($data['country']);

            // Return view with bound data
            return View::make('countries.record', $data);

        } else {
            // Load the record
            $country = Country::find($id);

            // Modify record values
            $country->name = $info['name'];
            $country->code = $info['code'];
            $country->continent = $info['continent'];
            $country->population = $info['population'];
            $country->head_of_state = $info['head_of_state'];

            // Save the modifications back to the database
            $country->save();

            // Back to countries list
            return Redirect::to('countries');
        }
    }

    /**
     * Process POST request to delete a country based on provided ID
     *
     * @param int ID value of the record to delete
     *
     * @returns Redirect Redirection to Country Listing
     */
    protected function processDelete($id = false)
    {
        // Check if id has been provided and is valid
        if ($id === false && preg_match('/^[0-9]+$/', $id) == 0) {
            App::abort(403, 'Invalid or no ID value provided.');
        }

        // Delete record from the database
        Country::destroy($id);

        // Back to countries list
        return Redirect::to('countries');
    }
}