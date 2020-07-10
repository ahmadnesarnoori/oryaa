@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                @include('partials.success')
                @include('partials.errors')

            <div class="card">
                <div class="card-header bg-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' User Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                  <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                  <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select id="country" type="test" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>
                                    <option>    Afghanistan     </option>
                                    <option>    Albania     </option>
                                    <option>    Algeria     </option>
                                    <option>    American Samoa  </option>
                                    <option>    Andorra     </option>
                                    <option>    Angola  </option>
                                    <option>    Anguilla    </option>
                                    <option>    Antigua & Barbuda   </option>
                                    <option>    Argentina   </option>
                                    <option>    Armenia     </option>
                                    <option>    Aruba   </option>
                                    <option>    Australia   </option>
                                    <option>    Austria     </option>
                                    <option>    Azerbaijan  </option>
                                    <option>    Bahamas, The    </option>
                                    <option>    Bahrain     </option>
                                    <option>    Bangladesh  </option>
                                    <option>    Barbados    </option>
                                    <option>    Belarus     </option>
                                    <option>    Belgium     </option>
                                    <option>    Belize  </option>
                                    <option>    Benin   </option>
                                    <option>    Bermuda     </option>
                                    <option>    Bhutan  </option>
                                    <option>    Bolivia     </option>
                                    <option>    Bosnia & Herzegovina    </option>
                                    <option>    Botswana    </option>
                                    <option>    Brazil  </option>
                                    <option>    British Virgin Is.  </option>
                                    <option>    Brunei  </option>
                                    <option>    Bulgaria    </option>
                                    <option>    Burkina Faso    </option>
                                    <option>    Burma   </option>
                                    <option>    Burundi     </option>
                                    <option>    Cambodia    </option>
                                    <option>    Cameroon    </option>
                                    <option>    Canada  </option>
                                    <option>    Cape Verde  </option>
                                    <option>    Cayman Islands  </option>
                                    <option>    Central African Rep.    </option>
                                    <option>    Chad    </option>
                                    <option>    Chile   </option>
                                    <option>    China   </option>
                                    <option>    Colombia    </option>
                                    <option>    Comoros     </option>
                                    <option>    Congo, Dem. Rep.    </option>
                                    <option>    Congo, Repub. of the    </option>
                                    <option>    Cook Islands    </option>
                                    <option>    Costa Rica  </option>
                                    <option>    Cote d'Ivoire   </option>
                                    <option>    Croatia     </option>
                                    <option>    Cuba    </option>
                                    <option>    Cyprus  </option>
                                    <option>    Czech Republic  </option>
                                    <option>    Denmark     </option>
                                    <option>    Djibouti    </option>
                                    <option>    Dominica    </option>
                                    <option>    Dominican Republic  </option>
                                    <option>    East Timor  </option>
                                    <option>    Ecuador     </option>
                                    <option>    Egypt   </option>
                                    <option>    El Salvador     </option>
                                    <option>    Equatorial Guinea   </option>
                                    <option>    Eritrea     </option>
                                    <option>    Estonia     </option>
                                    <option>    Ethiopia    </option>
                                    <option>    Faroe Islands   </option>
                                    <option>    Fiji    </option>
                                    <option>    Finland     </option>
                                    <option>    France  </option>
                                    <option>    French Guiana   </option>
                                    <option>    French Polynesia    </option>
                                    <option>    Gabon   </option>
                                    <option>    Gambia, The     </option>
                                    <option>    Gaza Strip  </option>
                                    <option>    Georgia     </option>
                                    <option>    Germany     </option>
                                    <option>    Ghana   </option>
                                    <option>    Gibraltar   </option>
                                    <option>    Greece  </option>
                                    <option>    Greenland   </option>
                                    <option>    Grenada     </option>
                                    <option>    Guadeloupe  </option>
                                    <option>    Guam    </option>
                                    <option>    Guatemala   </option>
                                    <option>    Guernsey    </option>
                                    <option>    Guinea  </option>
                                    <option>    Guinea-Bissau   </option>
                                    <option>    Guyana  </option>
                                    <option>    Haiti   </option>
                                    <option>    Honduras    </option>
                                    <option>    Hong Kong   </option>
                                    <option>    Hungary     </option>
                                    <option>    Iceland     </option>
                                    <option>    India   </option>
                                    <option>    Indonesia   </option>
                                    <option>    Iran    </option>
                                    <option>    Iraq    </option>
                                    <option>    Ireland     </option>
                                    <option>    Isle of Man     </option>
                                    <option>    Israel  </option>
                                    <option>    Italy   </option>
                                    <option>    Jamaica     </option>
                                    <option>    Japan   </option>
                                    <option>    Jersey  </option>
                                    <option>    Jordan  </option>
                                    <option>    Kazakhstan  </option>
                                    <option>    Kenya   </option>
                                    <option>    Kiribati    </option>
                                    <option>    Korea, North    </option>
                                    <option>    Korea, South    </option>
                                    <option>    Kuwait  </option>
                                    <option>    Kyrgyzstan  </option>
                                    <option>    Laos    </option>
                                    <option>    Latvia  </option>
                                    <option>    Lebanon     </option>
                                    <option>    Lesotho     </option>
                                    <option>    Liberia     </option>
                                    <option>    Libya   </option>
                                    <option>    Liechtenstein   </option>
                                    <option>    Lithuania   </option>
                                    <option>    Luxembourg  </option>
                                    <option>    Macau   </option>
                                    <option>    Macedonia   </option>
                                    <option>    Madagascar  </option>
                                    <option>    Malawi  </option>
                                    <option>    Malaysia    </option>
                                    <option>    Maldives    </option>
                                    <option>    Mali    </option>
                                    <option>    Malta   </option>
                                    <option>    Marshall Islands    </option>
                                    <option>    Martinique  </option>
                                    <option>    Mauritania  </option>
                                    <option>    Mauritius   </option>
                                    <option>    Mayotte     </option>
                                    <option>    Mexico  </option>
                                    <option>    Micronesia, Fed. St.    </option>
                                    <option>    Moldova     </option>
                                    <option>    Monaco  </option>
                                    <option>    Mongolia    </option>
                                    <option>    Montserrat  </option>
                                    <option>    Morocco     </option>
                                    <option>    Mozambique  </option>
                                    <option>    Namibia     </option>
                                    <option>    Nauru   </option>
                                    <option>    Nepal   </option>
                                    <option>    Netherlands     </option>
                                    <option>    Netherlands Antilles    </option>
                                    <option>    New Caledonia   </option>
                                    <option>    New Zealand     </option>
                                    <option>    Nicaragua   </option>
                                    <option>    Niger   </option>
                                    <option>    Nigeria     </option>
                                    <option>    N. Mariana Islands  </option>
                                    <option>    Norway  </option>
                                    <option>    Oman    </option>
                                    <option>    Pakistan    </option>
                                    <option>    Palau   </option>
                                    <option>    Panama  </option>
                                    <option>    Papua New Guinea    </option>
                                    <option>    Paraguay    </option>
                                    <option>    Peru    </option>
                                    <option>    Philippines     </option>
                                    <option>    Poland  </option>
                                    <option>    Portugal    </option>
                                    <option>    Puerto Rico     </option>
                                    <option>    Qatar   </option>
                                    <option>    Reunion     </option>
                                    <option>    Romania     </option>
                                    <option>    Russia  </option>
                                    <option>    Rwanda  </option>
                                    <option>    Saint Helena    </option>
                                    <option>    Saint Kitts & Nevis     </option>
                                    <option>    Saint Lucia     </option>
                                    <option>    St Pierre & Miquelon    </option>
                                    <option>    Saint Vincent and the Grenadines    </option>
                                    <option>    Samoa   </option>
                                    <option>    San Marino  </option>
                                    <option>    Sao Tome & Principe     </option>
                                    <option>    Saudi Arabia    </option>
                                    <option>    Senegal     </option>
                                    <option>    Serbia  </option>
                                    <option>    Seychelles  </option>
                                    <option>    Sierra Leone    </option>
                                    <option>    Singapore   </option>
                                    <option>    Slovakia    </option>
                                    <option>    Slovenia    </option>
                                    <option>    Solomon Islands     </option>
                                    <option>    Somalia     </option>
                                    <option>    South Africa    </option>
                                    <option>    Spain   </option>
                                    <option>    Sri Lanka   </option>
                                    <option>    Sudan   </option>
                                    <option>    Suriname    </option>
                                    <option>    Swaziland   </option>
                                    <option>    Sweden  </option>
                                    <option>    Switzerland     </option>
                                    <option>    Syria   </option>
                                    <option>    Taiwan  </option>
                                    <option>    Tajikistan  </option>
                                    <option>    Tanzania    </option>
                                    <option>    Thailand    </option>
                                    <option>    Togo    </option>
                                    <option>    Tonga   </option>
                                    <option>    Trinidad & Tobago   </option>
                                    <option>    Tunisia     </option>
                                    <option>    Turkey  </option>
                                    <option>    Turkmenistan    </option>
                                    <option>    Turks & Caicos Is   </option>
                                    <option>    Tuvalu  </option>
                                    <option>    Uganda  </option>
                                    <option>    Ukraine     </option>
                                    <option>    United Arab Emirates    </option>
                                    <option>    United Kingdom  </option>
                                    <option>    United States   </option>
                                    <option>    Uruguay     </option>
                                    <option>    Uzbekistan  </option>
                                    <option>    Vanuatu     </option>
                                    <option>    Venezuela   </option>
                                    <option>    Vietnam     </option>
                                    <option>    Virgin Islands  </option>
                                    <option>    Wallis and Futuna   </option>
                                    <option>    West Bank   </option>
                                    <option>    Western Sahara  </option>
                                    <option>    Yemen   </option>
                                    <option>    Zambia  </option>
                                    <option>    Zimbabwe    </option>

                                </select>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="test" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                @if ($errors->has('phone_numberh'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <p>By signing up, you agree to the <a href="therms">Therms of Services</a> and <a href="privacy_policy">Privacy Policy</a>, including <a>Cookie Use</a>. Other will be able to find you by email or phone number when provided.<p>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                        </div>
                        <ul></ul>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-light login border">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
