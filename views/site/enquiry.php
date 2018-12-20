<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 19/12/18
 * Time: 11:53 AM
 */
?>

<div id="content">
    <div class="container">
        <div class="row justify-content-md-center">
                <div class="col-md-7 col-lg-8 col-xl-8">
                    <div class="page-header bordered">
                        <h1>Submit your property
                            <small>We've over 15 Lac buyers and tenants for you!</small>
                        </h1>
                    </div>
                    <form action="index.php">
                        <h3 class="subheadline">Anout You</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>No. of House</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                        </div>
                        <h3 class="subheadline">Basic Details</h3>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="bedrooms"
                                            class="form-control form-control-lg ui-select">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7+">7+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="bedrooms">Bedrooms</label>
                                    <select name="bedrooms" id="bedrooms"
                                            class="form-control form-control-lg ui-select">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7+">7+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6   ">
                                <div class="form-group">
                                    <label for="bathrooms">Bathrooms</label>
                                    <select name="bathrooms" id="bathrooms"
                                            class="form-control form-control-lg ui-select">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Area Sq/ft</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                        </div>
                        <h3 class="subheadline">Location</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control form-control-lg" id="autocomplete"
                                           placeholder="Enter your location">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control form-control-lg" placeholder=""
                                           id="locality">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control form-control-lg" placeholder=""
                                           id="administrative_area_level_1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="" id="country">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Zipcode</label>
                                    <input type="text" class="form-control form-control-lg" placeholder=""
                                           id="postal_code">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'long_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    tinymce.init({
        selector: '.text-editor',
        height: 200,
        menubar: false,
        branding: false,
        plugins: [
            'lists link image preview',
        ],
        toolbar: 'undo redo | link | formatselect | bold italic underline  | alignleft aligncenter alignright alignjustify | bullist numlist'
    });
</script>

