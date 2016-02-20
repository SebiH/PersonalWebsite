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

