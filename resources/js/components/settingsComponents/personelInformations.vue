<template>
    <div class="box12" >
        <div class="box121">
            <div class="picP">
                <img class="photo-pff" src="picture/profile.jpg">
                <div class="shadow1"></div>
                <div class="shadow2"></div>
            </div>
        </div>
        <div class="box122">
            <div class="box-input">
                <h5>FIRST NAME</h5>
                <input type="text" name="last_name">
            </div>
            <div class="box-input">
                <h5>LAST NAME</h5>
                <input type="text" name="last_name">
            </div>
            <div class="box-input">
                <h5>DATE of BIRTH</h5>
                <Datepicker
                    v-model="date"
                    lang="fr"
                    type="date"
                    format="YYYY-MM-dd"
                />
            </div>
            <div class="box-input">
                <h5>Email</h5>
                <input type="text" name="last_name">
            </div>
            <div class="box-input">
                <h5>PHONE</h5>
                <input type="text" name="last_name">
            </div>
            <div class="box-input">
                <h5>PASSWORD</h5>
                <input type="text" name="last_name">
            </div>
        </div>
        <div class="box123">
            <div class="box1231">
                <div class="box-input">
                    <h5>WILAYA</h5>
                    <div class="select-box">
                        <div class="options-container" :class="{ active: show_w }">
                            <div class="option" v-for="(w,index) in wilaya" @click="select('w',w)">
                                <input type="radio" class="radio" id="news" name="category" />
                                <label for="news" >{{w}}</label>
                            </div>
                        </div>
                        <div class="selectedd" @click="show_w = !show_w" @focusout="hiden" tabindex="0">
                            {{ w ? w : 'select' }}
                        </div>
                    </div>
                </div>
                <div class="box-input">
                    <h5>DAIRA</h5>
                    <div class="select-box">
                        <div class="options-container" :class="{ active: show_d }">
                            <div class="option" v-for="(d,index) in daira" @click="select('d',d)">
                                <input type="radio" class="radio" id="news" name="category" />
                                <label for="news" >{{d}}</label>
                            </div>
                        </div>
                        <div class="selectedd" @click="show_d = !show_d" @focusout="hiden" tabindex="0">
                            {{ d ? d : 'select' }}
                        </div>
                    </div>
                </div>
                <div class="box-input">
                    <h5>COMMUNE</h5>
                    <div class="select-box">
                        <div class="options-container" :class="{ active: show_c }">
                            <div class="option" v-for="(c,index) in commune" @click="select('c',c)">
                                <input type="radio" class="radio" id="news" name="category" />
                                <label for="news" >{{c}}</label>
                            </div>
                        </div>
                        <div class="selectedd" @click="show_c = !show_c" @focusout="hiden" tabindex="0">
                            {{ c ? c : 'select' }}
                        </div>
                    </div>
                </div>
                <div class="box-input">
                    <h5>CONFIRM PASSWORD</h5>
                    <div class="wrapper">
                        <div class="contentt">
                            <p>Press enter or add a comma after each Skills</p>
                            <ul>
                                <li v-for="(tag,index) in tags">
                                    {{ tag }}
                                    <i class="uit uit-multiply" @click="remove(this,index)"></i>
                                </li>
                                <input class="input-skills" type="text" spellcheck="false" @keydown.enter="createTag">
                            </ul>
                        </div>
                        <div class="details">
                            <p><span>{{ tags.length }}</span> tags are remaining</p>
                            <button @click="this.tags=[]">Remove All</button>
                        </div>
                    </div>
                </div>
                <div class="box-input">
                    <button class="save">Save</button>
                </div>
            </div>
            <div class="box1232">

            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vue3-datepicker'


export default {
    components: {
        Datepicker
    },
    mounted() {

        /*-------------------------*/
    },
    data() {
        return {
            tags : ["coding","coding", "nepal"],
            wilaya:["1","2", "3"],
            daira:["4","5", "6"],
            commune:["7","8", "9"],
            date:new Date(),
            show_w:false,
            show_d:false,
            show_c:false,
            w:"",
            d:"",
            c:"",
            maxTags : 10,
        };
    },
    methods: {
        createTag(e){
            e.preventDefault();
            var val = e.target.value.trim();
            if(this.tags.length<10){
                this.tags.push(val);
                e.target.value = "";
            }
        },
        remove(element, index){
            this.tags.splice(index, 1);
            element.parentElement.remove();
        },
        select(value,e){
            if(value=='w'){
                this.w=e;
            }
            else if(value=='d'){
                this.d=e;
            }
            else if(value=='c'){
                this.c=e;
            }
        },
        hiden(){
            this.show_w=false;
            this.show_d=false;
            this.show_c=false;
        }

    },

}
</script>
