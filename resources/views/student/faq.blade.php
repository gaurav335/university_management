@extends('student-layout.master')
<title>Student | Faq</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Frequently Asked Questions</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a> -</li>
                <li>Faq</li>
            </ul>
        </div>
    </div>
</div>
<div class="faq-page-area">
    <div class="container">
        <div class="faq-items" id="accordionFaq">
            <div class="row">
                <div class="col-lg-6">
                    <div class="faq-item">
                        <div class="faq-title" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span
                                    class="faq-count">1</span>Plummy text printing and typesetting
                                iyourndustry.</button>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span
                                    class="faq-count">2</span>Plummy text printing and typesetting
                                iyourndustry.</button>
                        </div>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree"><span class="faq-count">3</span>Plummy text printing and
                                typesetting iyourndustry.</button>
                        </div>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-item">
                        <div class="faq-title" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span
                                    class="faq-count">4</span>Plummy text printing and typesetting
                                iyourndustry.</button>
                        </div>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><span
                                    class="faq-count">5</span>Plummy text printing and typesetting
                                iyourndustry.</button>
                        </div>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-title" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><span
                                    class="faq-count">6</span>Plummy text printing and typesetting
                                iyourndustry.</button>
                        </div>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionFaq">
                            <div class="faq-body">Dorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuriesthe leap
                                into electronic.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection