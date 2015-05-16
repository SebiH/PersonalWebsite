{% set projects = jsonloader.fromFile("projects.json")  %}




<div class="main-content hcenter-container">
    <div class="hcenter proj-maincontainer">
            <h1 class="proj-maintitle"> Completed Projects </h1>

            {% for project in projects %}

                <div class="proj-container">


                    {# Project image #}
                    <div class="pure-g">
                        {% if project.highlight %}
                        <div class="pure-u-1">
                        {% else %}
                        <div class="pure-u-1 pure-u-sm-1-2">
                        {% endif %}
                            {{ project.picture }}
                        </div>

                        {% if project.highlight %}
                        <div class="proj-text pure-u-1">
                        {% else %}
                        <div class="proj-text pure-u-1 pure-u-sm-1-2">
                        {% endif %}

                            <h2 class="proj-title"> {{ project.title }} </h2>
                            <hr/>
                            <div class="proj-data pure-g">
                    
                                {% for name, statistic in project.statistics %}

                                <div class="pure-u-1-2">
                                    <p> {{ name }} </p>
                                </div>
                                <div class="pure-u-1-2">
                                    <p> {{ statistic }} </p>
                                </div>

                                {% endfor %}

                            </div>
                        </div>
                    </div>


                    <div class="proj-description">
                        {% for description in project.descriptions %}    
                        <p> {{ description }} </p>
                        {% endfor %}    
                    </div>

                </div>

                <br/>
                <br/>
                <br/>

            {% endfor %}
    </div>
</div>




{#


            <!-- MediaRoomControl -->
            <div class="proj-container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-sm-1-2">
                        <img class="proj-image pure-img" src="/img/MediaRoomControl.jpg" alt="Project screenshot"/>
                    </div>

                    <div class="proj-text pure-u-1 pure-u-sm-1-2">
                        <h2 class="proj-title"> MediaRoomControl </h2>
                        <hr/>
                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Technologies used </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> C, C# </p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Timeframe </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> Oct 2013 - Feb 2014 </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="proj-description">
                    <p> Created for the course of "Blended Interaction" at the University of Konstanz, MediaRoomControl offers intuitive keyboard and mouse controls in multi-computer systems. </p>
                    <p> Using spatial data from an OptiTrack / Proximity Toolkit system, the system is able to track different input devices in a room; with this the system can detect different interactions with monitors, such as touching the monitor with an input device. This action binds the user's input device to the touched monitor, redirecting all input to the monitor's corresponding machine. This allows for easy and intuitive switching between different machines and removes the tedious searching for the correct input device. </p>
                    <p> The system is able to run as startup daemon, and does not need any special configuration due to IPv4 address discovery via UDP. Input is currently intercepted on a RaspberryPi / Debian system, and sent to a central server using TCP. With remote procedure calling, the server can relay the relevant commands to the corresponding client. </p>
                </div>
            </div>









            <!-- FacetStream++ - Result Visualization -->
            <div class="proj-container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-sm-1-2">
                        <img class="proj-image pure-img" src="/img/HyperGrid.jpg" alt="Project screenshot"/>
                    </div>

                    <div class="proj-text pure-u-1 pure-u-sm-1-2">
                        <h2 class="proj-title"> FacetStream++ - HyperGrid </h2>
                        <hr/>
                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Technologies used </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> C# </p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Timeframe </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> Jan 2013 - Apr 2013 </p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Featured in (2:00 - 2:12) </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> <a href="https://www.youtube.com/watch?v=_dv4KxkNCKI" target="_blank">Blended Library</a></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="proj-description">
                    <p> FacetStream++ enables a group of users to collaboratively and simultaneously search in large amounts of data - for example for books in a library. The results are visualized in a HyperGrid - offering both an overview of the selected data, as well as detailled information by tapping the entry. </p> 
                    <p> FacetStream++ and the HyperGrid are now part of librOS, standing in the Central Library of Cologne, as well as in the library of the University of Konstanz. </p>
                </div>
            </div>








            <!-- ISGCI -->
            <div class="proj-container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-sm-1-2">
                        <img class="proj-image pure-img" src="/img/ISGCI.jpg" alt="Project screenshot"/>
                    </div>

                    <div class="proj-text pure-u-1 pure-u-sm-1-2">
                        <h2 class="proj-title"> ISGCI </h2>
                        <hr/>
                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Technologies used </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> Java </p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Timeframe </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> May 2013 - Jul 2013</p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Original Project </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> <a href="http://www.graphclasses.org/" target="_blank">http://www.graphclasses.org/</a></p>
                            </div>
                        </div>

                        <div class="proj-data pure-g">
                            <div class="pure-u-1-2">
                                <p> Source code </p>
                            </div>
                            <div class="pure-u-1-2">
                                <p> <a href="https://github.com/Konsteirama/KonDrawer-JGraphX-Integration" target="_blank">Available on GitHub!</a> </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="proj-description">
                    <p>
                    ISGCI is an open-source graph-visualisation application. Since it has been in development for over a decade (started in 1999), its code-base is ancient, relying on out-of-date Java features. 
                    </p>
                    <p>
                    As part of the 'Software Engineering' course at the University of Konstanz, the codebase was partially refactored, extended and adapted to use an up-to-date graph-drawing library - in this case JGraphX.
                    </p>
                    <p>
                    The project received the second-highest grade possible and was named the best project of the course.
                    </p>

                </div>
            </div>



    </div>
</div>
#}
