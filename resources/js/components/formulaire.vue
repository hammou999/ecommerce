<template>
    <div class="wrapper">
        <form action="#" @submit.prevent="register">
            <Transition name="confirm">
                <div class="confirm" v-if="confirm" @click.self="confirm=false">
                    <div class="box-confirm">
                        <div class="box-head">
                            <h5>
                                إضافة منتج لسلة التسوق
                            </h5>
                            <img src="/picture/icon/cancel.png" @click="confirm=false">
                        </div>
                        <div class="box-confirm-content">
                            <div class="roww" v-if="colors.length!=0">
                                <div class="coll">
                                    <label for="adresse">اللون:<span class="totalItemsAmount">*</span></label>
                                </div>
                                <div class="coll">
                                    <div class="grilcolor" ref="selectedColor">
                                        <div v-for="color in colors" :key="color.id" class="cartitem"
                                             @click="selectColor(color)"
                                             :class="`clearfix${color.id ==selectedColor.id ? ' ItemActive' : ''}`">
                                            <img v-bind:src="'/picture/product/'+product.id+'/'+color.picture_url"/>
                                            <div>
                                                {{color.title}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="roww" v-if="sizes.length!=0">
                                <div class="coll">
                                    <label for="adresse">القيس:<span class="totalItemsAmount">*</span></label>
                                </div>
                                <div class="coll">
                                    <div class="grilcolor" ref="selectedSize">
                                        <div v-for="size in sizes" :key="size.id" @click="selectSize(size)"
                                             class="sizeitem"
                                             :class="`clearfix${size.id == selectedSize.id ? ' ItemActive' : ''}`">
                                            {{size.title}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="roww">
                            <span class="totalItemsAmount">
                        إجمالي التكلفة (بدون التوصيل) <span class="disDirection">{{this.totalItemsAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g," ")}},00</span> دج</span>
                            </div>
                            <div class="coll2">
                                <div class="coll1">
                                    <input type="number" id="quantity" v-model="quantity" min="1" ref="quantity"
                                           @focusout="quantityfocusout($event)"
                                           @input="updateProductItem($event)" required>
                                </div>
                                <div class="roww11">
                                    <input type="button" @click="addToCart" value="إضافة لسلة التسوق">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </Transition>
            <Transition name="error">
                <div class="error" v-if="errors" v-text="errors"></div>
            </Transition>
            <div class="roww">
                <div class="coll">
                    <label for="fname">الإسم الكامل:<span class="totalItemsAmount">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="fname" ref="fname" v-model="fullname" placeholder="الإسم واللقب">
                </div>
            </div>

            <div class="roww">
                <div class="coll">
                    <label for="phone">رقم الهاتف:<span class="totalItemsAmount">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="phone" ref="phone" v-model="phone"
                           placeholder="يرجى إدخال رقم هاتف صالح">
                </div>
            </div>

            <div class="roww">
                <div class="coll">
                    <label for="adresse">العنوان الكامل:<span class="totalItemsAmount">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="adresse" ref="adresse" v-model="adresse"
                           placeholder="يرجى إدخال عنوان التوصيل">
                </div>
            </div>
            <div class="coll2">
                <div class="roww1">
                    <div class="coll">
                        <label for="wilaya">الولاية:<span class="totalItemsAmount">*</span></label>
                    </div>
                    <div class="coll">
                        <select id="wilaya" ref="wilaya" v-model="wilaya" @change="selectWilaya($event)">
                            <option value="">-- Wilaya --</option>
                            <option v-for="(wilaya, index) in all_wilaya" :value="wilaya.wilaya_code">
                                {{ wilaya.wilaya_code}} {{ wilaya.wilaya_name}} - {{ wilaya.wilaya_name_ascii}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="roww1">
                    <div class="coll">
                        <label for="commune">البلدية:<span class="totalItemsAmount">*</span></label>
                    </div>
                    <div class="coll">
                        <select id="commune" ref="commune" v-model="commune"
                                @change="selectCommune($event.target.selectedIndex)">
                            <option value="">-- Commune --</option>
                            <option v-for="(commune, index) in all_commune" :value="commune.id">
                                {{ commune.commune_name}} - {{ commune.commune_name_ascii}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="roww" v-if="colors.length!=0">

                <div class="coll">
                    <label for="adresse">اللون:<span class="totalItemsAmount">*</span></label>
                </div>
                <div class="coll">
                    <div class="grilcolor" ref="selectedColor">
                        <div v-for="color in colors" :key="color.id" class="cartitem"
                             @click="selectColor(color)"
                             :class="`clearfix${color.id ==selectedColor.id ? ' ItemActive' : ''}`">
                            <img v-bind:src="'/picture/product/'+product.id+'/'+color.picture_url"/>
                            <div>
                                {{color.title}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roww" v-if="sizes.length!=0">
                <div class="coll">
                    <label for="adresse">القيس:<span class="totalItemsAmount">*</span></label>
                </div>
                <div class="coll">
                    <div class="grilcolor" ref="selectedSize">
                        <div v-for="size in sizes" :key="size.id" @click="selectSize(size)" class="sizeitem"
                             :class="`clearfix${size.id == selectedSize.id ? ' ItemActive' : ''}`">
                            {{size.title}}
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="roww">
                    <span class="totalItemsAmount">
                        إجمالي التكلفة (مع التوصيل) <span class="disDirection">{{this.totalItemsAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g," ")}},00</span> دج</span>
            </div>
            <div id="s" ref="s"></div>
            <div class="coll2">
                <div class="coll1">
                    <input type="number" id="quantity" v-model="quantity" min="1" ref="quantity" @focusout="quantityfocusout($event)"
                           @input="updateProductItem($event)" required>
                </div>
                <div class="roww11" v-if="submit">
                    <input type="submit" value="تأكيد الطلب">
                </div>
            </div>
            <div class="row1" v-if="!submit">
                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                <a href="#"><i class="fab fa-whatsapp whatsapp-bg"></i></a>

                <input type="number" min="1" v-model="quantity" @focusout="quantityfocusout($event)"
                       @input="updateProductItem($event)" required>
                <input type="button" @click="confirme" value="إضافة للسلة">
                <input type="submit" value="الشراء الآن">
            </div>
        </form>
        <div class="body" v-if="load">
            <div class="loader">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>
            <div class="load">
                جري تسجيل طلبك .... يرجى الإنتظار...
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: {
            product: Object,
            colors: Object,
            sizes: Object
        },
        data() {
            return {
                stickyOptions: {
                    marginTop: 20,
                    forName: 0,
                    className: 'stuck'
                },
                all_wilaya: [],
                all_commune: [],
                errors: "",
                validationerror: "",
                quantity: 1,
                shiping: "",
                totalItemsAmount: parseInt(this.product['price']),
                fullname: "",
                phone: "",
                adresse: "",
                wilaya: "",
                commune: "",
                selectedColor: "",
                selectedSize: "",
                load: false,
                valid: false,
                submit: false,
                confirm: false,
                products: this.product,
            };
        },

        watch: {
            errors: function () {
                if (this.errors) {
                    setTimeout(() => this.errors = '', 4000)
                }
            },
            confirm:function () {
                this.updateTotalAmount();
            }
        },

        mounted() {
            console.log(this.product)
            axios.get("/getWilaya").then(({data}) => {
                this.all_wilaya = data;
            });
            window.addEventListener('scroll', this.handleScroll);
        },

        methods: {
            handleScroll() {
                var el = this.$refs.s;
                var rect = el.getBoundingClientRect();
                var elemTop = rect.top;
                var elemBottom = rect.bottom;

                // Only completely visible elements return true:
                this.submit = (elemTop >= 0) && (elemBottom <= window.innerHeight);
                // Partially visible elements return true:
                //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
            },

            confirme() {
                this.confirm = true;
            }

            ,
            updateTotalAmount() {
                if (this.confirm)
                    this.totalItemsAmount = (parseInt(this.product['price']) + parseInt(this.selectedColor.price ? this.selectedColor.price : '0') + parseInt(this.selectedSize.price ? this.selectedSize.price : '0')) * this.quantity;
                else this.totalItemsAmount = (parseInt(this.product['price']) + parseInt(this.selectedColor.price ? this.selectedColor.price : '0') + parseInt(this.selectedSize.price ? this.selectedSize.price : '0')) * this.quantity + parseInt(this.shiping.prix ? this.shiping.prix : '0');
            }

            ,
            quantityfocusout(event) {
                //console.log(this.quantity)
                if (!/^[1-9][0-9]*$/.test(this.quantity)) {
                    this.quantity = 1;
                    this.updateTotalAmount();
                }
            }
            ,

            updateProductItem(event) {
                //console.log(this.quantity)
                if (/^[1-9][0-9]*$/.test(event.target.value)) {
                    this.updateTotalAmount();
                }
            },

            addToCart() {
                if (this.colors.length!=0 && !this.selectedColor) {
                    this.errors = "يرجى إختيار اللون"
                } else if (this.sizes.length!=0 && !this.selectedSize) {
                    this.errors = "يرجى إختيار المقياس"
                } else {
                    axios.post('/addToCart', {
                        product_id: this.product['id'],
                        name: this.product['title'],
                        quantity: this.quantity,
                        price: this.totalItemsAmount/this.quantity,
                        colorId: this.selectedColor.id,
                        sizeId: this.selectedSize.id,
                        picture_url : (this.selectedColor.id ? this.selectedColor.picture_url:this.product['url_picture'])
                    }).then((response) => {
                        //                       this.load = false;
                        window.location.href = "?cart="+this.product['title'];
                    })
                }
            },

            selectColor(color) {
                this.selectedColor = color;
                this.updateTotalAmount();
            },

            selectSize(size) {
                this.selectedSize = size;
                this.updateTotalAmount();
            },

            selectWilaya(event) {
                if (event.target.value.length > 0) {
                    axios.get("/getCommune/" + event.target.value).then(({data}) => {
                        this.all_commune = data;
                    });
                }
            },

            selectCommune(selectedIndex) {
                this.shiping = this.all_commune[selectedIndex];
                this.updateTotalAmount();
            },

            register() {
                if (!/^([^ ]{2,12}[ ]){1,3}[^ ]{2,12}$/.test(this.fullname)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.fname.focus(), 500);
                    this.errors = "يرجى إدخال الإسم واللقب بشكل صحيح"
                } else if (!/^[0][567][0-9]{8}$/.test(this.phone)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.phone.focus(), 500);
                    this.errors = "يرجى التأكد من رقم هاتف المدخل "
                } else if (!/^.{4,30}$/.test(this.adresse)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.adresse.focus(), 500);
                    this.errors = "يرجى إدخال عنوان صحيح"
                } else if (this.wilaya.length == 0) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.wilaya.focus(), 500);
                    this.errors = "يرجى إختيار الولاية"
                } else if (this.commune.length == 0) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.commune.focus(), 500);
                    this.errors = "يرجى إختيار البلدية"
                } else if (this.selectedColor.length == 0) {
                    this.$refs.selectedColor.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.selectedColor.focus(), 500);
                    this.errors = "يرجى نوع المنتج"
                } else {
                    this.load = true;
                    axios.post('/saveOrder', {
                        full_name: this.fullname,
                        phone: this.phone,
                        adresse: this.adresse,
                        commune_id: this.commune,
                        total: this.totalItemsAmount,
                        products: [{"product_id":this.product.id,"quantity": this.quantity , "color_id":this.selectedColor.id, "size_id":this.selectedSize.id}]
                    }).then((response) => {
                        //                       this.load = false;
                        window.location.href = "?name=" + this.fullname;
                    })
                }
            }

        },
    };
</script>

<style>
    * {
        font-family: Tajawal;
        font-size: 13pt;
    }

    input[type=text], input[type=number], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 5px 5px 0px;
        margin: 0;
        display: inline-block;
    }

    input[type=submit], input[type=button] {
        font-weight: 600;
        width: 100%;
        padding: 12px 20px;
        cursor: pointer;
        outline: none;
        transition: all .25s;
        background-color: #a23c76;
        border: none;
        border-radius: 8px;
        font-size: 14pt;
        color: #ffffff;

    }

    input[type=submit]:hover, input[type=button]:hover {
        background-color: #803160;
        color: #000;
    }

    .wrapper {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;

    }

    .coll {
        float: left;
        width: 100%;
        margin-top: 0;
    }

    .roww, .row1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }

    .row1 {
        position: fixed;
        display: flex;
        width: 100%;
        height: 55px;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s, height 0.3s 0.1s;
        z-index: 12;
        background-color: #fff;
        border-top: 1px solid #f0f0f0;
        padding: 10px 0;
    }

    .row1 input[type=submit], .row1 input[type=button] {
        border-radius: 5px;
        max-width: 400px;
        width: 25%;
        margin-right: 5px;
        height: 35px;
        background-color: red;
        font-size: 14px;
        padding: 8px;
    }

    .row1 input[type=number] {
        width: 80px;
        height: 36px;
        text-align: center;
        direction: ltr;
    }

    /* Clear floats after the columns */
    .roww:after, .row1 {
        content: "";
        display: table;
        clear: both;
    }

    .totalItemsAmount {
        text-align: center;
        margin-bottom: 20px;
        font-size: 16pt;
        font-weight: bold;
        color: #e23333;
    }

    .totalItemsAmount span{
        font-size: 16pt;
    }

    .error {
        position: fixed;
        display: flex;
        width: 100%;
        height: 50px;
        background-color: red;
        outline: none;
        font-size: 14px;
        color: white;
        bottom: 0px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 14pt;
        font-family: Tajawal;
        font-weight: 600;
        align-items: center;
        justify-content: center;
        transition: all .25s;
        z-index: 25;
    }

    .body {
        height: 100%;
        width: 100%;
        z-index: 15;
        background: #ea4961;
        position: fixed;
        display: flex;
        flex-direction: column;
        top: 0;
        left: 0;
        align-items: center;
        justify-content: center;
    }

    .load {
        font-size: 14pt;
        font-weight: bolder;
        font-family: Tajawal;
        margin-top: 15px;
    }

    .loader {
        position: relative;
        width: 75px;
        height: 100px;
    }

    .loader__bar {
        position: absolute;
        bottom: 0;
        width: 10px;
        height: 50%;
        background: #fff;
        transform-origin: center bottom;
        box-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
    }

    .loader__bar:nth-child(1) {
        left: 0px;
        transform: scale(1, 0.2);
        -webkit-animation: barUp1 4s infinite;
        animation: barUp1 4s infinite;
    }

    .loader__bar:nth-child(2) {
        left: 15px;
        transform: scale(1, 0.4);
        -webkit-animation: barUp2 4s infinite;
        animation: barUp2 4s infinite;
    }

    .loader__bar:nth-child(3) {
        left: 30px;
        transform: scale(1, 0.6);
        -webkit-animation: barUp3 4s infinite;
        animation: barUp3 4s infinite;
    }

    .loader__bar:nth-child(4) {
        left: 45px;
        transform: scale(1, 0.8);
        -webkit-animation: barUp4 4s infinite;
        animation: barUp4 4s infinite;
    }

    .loader__bar:nth-child(5) {
        left: 60px;
        transform: scale(1, 1);
        -webkit-animation: barUp5 4s infinite;
        animation: barUp5 4s infinite;
    }

    .loader__ball {
        position: absolute;
        bottom: 10px;
        left: 0;
        width: 10px;
        height: 10px;
        background: #fff;
        border-radius: 50%;
        -webkit-animation: ball 4s infinite;
        animation: ball 4s infinite;
    }

    @-webkit-keyframes ball {
        0% {
            transform: translate(0, 0);
        }
        5% {
            transform: translate(8px, -14px);
        }
        10% {
            transform: translate(15px, -10px);
        }
        17% {
            transform: translate(23px, -24px);
        }
        20% {
            transform: translate(30px, -20px);
        }
        27% {
            transform: translate(38px, -34px);
        }
        30% {
            transform: translate(45px, -30px);
        }
        37% {
            transform: translate(53px, -44px);
        }
        40% {
            transform: translate(60px, -40px);
        }
        50% {
            transform: translate(60px, 0);
        }
        57% {
            transform: translate(53px, -14px);
        }
        60% {
            transform: translate(45px, -10px);
        }
        67% {
            transform: translate(37px, -24px);
        }
        70% {
            transform: translate(30px, -20px);
        }
        77% {
            transform: translate(22px, -34px);
        }
        80% {
            transform: translate(15px, -30px);
        }
        87% {
            transform: translate(7px, -44px);
        }
        90% {
            transform: translate(0, -40px);
        }
        100% {
            transform: translate(0, 0);
        }
    }

    @keyframes ball {
        0% {
            transform: translate(0, 0);
        }
        5% {
            transform: translate(8px, -14px);
        }
        10% {
            transform: translate(15px, -10px);
        }
        17% {
            transform: translate(23px, -24px);
        }
        20% {
            transform: translate(30px, -20px);
        }
        27% {
            transform: translate(38px, -34px);
        }
        30% {
            transform: translate(45px, -30px);
        }
        37% {
            transform: translate(53px, -44px);
        }
        40% {
            transform: translate(60px, -40px);
        }
        50% {
            transform: translate(60px, 0);
        }
        57% {
            transform: translate(53px, -14px);
        }
        60% {
            transform: translate(45px, -10px);
        }
        67% {
            transform: translate(37px, -24px);
        }
        70% {
            transform: translate(30px, -20px);
        }
        77% {
            transform: translate(22px, -34px);
        }
        80% {
            transform: translate(15px, -30px);
        }
        87% {
            transform: translate(7px, -44px);
        }
        90% {
            transform: translate(0, -40px);
        }
        100% {
            transform: translate(0, 0);
        }
    }

    @-webkit-keyframes barUp1 {
        0% {
            transform: scale(1, 0.2);
        }
        40% {
            transform: scale(1, 0.2);
        }
        50% {
            transform: scale(1, 1);
        }
        90% {
            transform: scale(1, 1);
        }
        100% {
            transform: scale(1, 0.2);
        }
    }

    @keyframes barUp1 {
        0% {
            transform: scale(1, 0.2);
        }
        40% {
            transform: scale(1, 0.2);
        }
        50% {
            transform: scale(1, 1);
        }
        90% {
            transform: scale(1, 1);
        }
        100% {
            transform: scale(1, 0.2);
        }
    }

    @-webkit-keyframes barUp2 {
        0% {
            transform: scale(1, 0.4);
        }
        40% {
            transform: scale(1, 0.4);
        }
        50% {
            transform: scale(1, 0.8);
        }
        90% {
            transform: scale(1, 0.8);
        }
        100% {
            transform: scale(1, 0.4);
        }
    }

    @keyframes barUp2 {
        0% {
            transform: scale(1, 0.4);
        }
        40% {
            transform: scale(1, 0.4);
        }
        50% {
            transform: scale(1, 0.8);
        }
        90% {
            transform: scale(1, 0.8);
        }
        100% {
            transform: scale(1, 0.4);
        }
    }

    @-webkit-keyframes barUp3 {
        0% {
            transform: scale(1, 0.6);
        }
        100% {
            transform: scale(1, 0.6);
        }
    }

    @keyframes barUp3 {
        0% {
            transform: scale(1, 0.6);
        }
        100% {
            transform: scale(1, 0.6);
        }
    }

    @-webkit-keyframes barUp4 {
        0% {
            transform: scale(1, 0.8);
        }
        40% {
            transform: scale(1, 0.8);
        }
        50% {
            transform: scale(1, 0.4);
        }
        90% {
            transform: scale(1, 0.4);
        }
        100% {
            transform: scale(1, 0.8);
        }
    }

    @keyframes barUp4 {
        0% {
            transform: scale(1, 0.8);
        }
        40% {
            transform: scale(1, 0.8);
        }
        50% {
            transform: scale(1, 0.4);
        }
        90% {
            transform: scale(1, 0.4);
        }
        100% {
            transform: scale(1, 0.8);
        }
    }

    @-webkit-keyframes barUp5 {
        0% {
            transform: scale(1, 1);
        }
        40% {
            transform: scale(1, 1);
        }
        50% {
            transform: scale(1, 0.2);
        }
        90% {
            transform: scale(1, 0.2);
        }
        100% {
            transform: scale(1, 1);
        }
    }

    @keyframes barUp5 {
        0% {
            transform: scale(1, 1);
        }
        40% {
            transform: scale(1, 1);
        }
        50% {
            transform: scale(1, 0.2);
        }
        90% {
            transform: scale(1, 0.2);
        }
        100% {
            transform: scale(1, 1);
        }
    }


    /* ------------------------------------------------- */

    .whatsapp-bg, .facebook-bg {
        display: inline-flex;
        width: 36px;
        height: 36px;
        border-radius: 3px;
        text-align: center;
        align-items: center;
        justify-content: center;
        color: white;
        margin-left: 5px;
    }

    #fname, #phone, #wilaya, #commune, #adresse {
        scroll-margin-top: 170px;
    }

    .coll2 {
        display: flex;

    }

    .roww1 {
        width: 50%;
        margin-right: 5px;
    }

    .coll1 {
        margin-left: 10px;
    }

    .roww11 {
        width: 100%;
    }

    .grilcolor {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        text-align: center;
        background: white;
        padding: 10px;
        border-radius: 5px;
    }

    .grilcolor img {
        width: 65px;
        margin: 5px;
    }

    .ItemActive {
        border-radius: 10px;
        box-shadow: 0px 0px 15px red;
        color: darkred;
    }

    .cartitem {
        margin: 10px;
        border: solid 2px black;
        background: white;
        cursor: pointer;
    }

    .confirm {
        position: fixed;
        overflow: hidden;
        margin: 0;
        padding: 0;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 20;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .box-confirm {
        background: #f2f2f2;
        border: none;
        top: 50% !important;
        right: calc(50% - 10px) !important;
        transform: translate(50%, -50%);
        z-index: 1250;
        position: fixed;
        margin: 10px;
        min-height: 140px;
        color: #000;
        width: calc(100% - 20px);
        max-width: 800px;
        border-radius: 5px;
    }

    .box-head {
        background-color: #a23c76;
        display: flex;
        flex-direction: row;
        align-items: center;
        box-shadow: 0px 0px 18px #888;
        border-radius: 5px 5px 0 0;
    }

    .box-head h5 {
        width: 100%;
        text-align: center;
        color: white;
    }

    .box-head img {
        width: 45px;
        cursor: pointer;
        border-radius: 5px 0 0 0;
    }

    .box-confirm .grilcolor {
        justify-content: center;
        padding: 0px;
    }

    .box-confirm input {
        text-align: center;
        margin: 10px;
        width: calc(100% - 20px);
    }

    .validationerror {
        text-align: center;
        color: red;
        font-weight: bolder;
    }

    .grilsize {
        display: flex;
    }

    .sizeitem {
        padding: 5px;
        margin: 10px;
        width: 50px;
        height: 50px;
        text-align: center;
        justify-content: center;
        background: white;
        border: solid 2px black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .error-enter-active, .error-leave-active {
        transition: all 0.5s ease-out;
    }

    .error-enter-from,
    .error-leave-to {
        transform: translateY(50px);
    }

    .confirm-enter-active,
    .confirm-leave-active {
        transition: all 0.5s ease-out;
    }

    .confirm-enter-from,
    .confirm-leave-to {
        opacity: 0;
    }

    .disDirection {
        direction: ltr !important;
        unicode-bidi: embed !important;
    }

    .box-confirm .roww {
    }

    .box-confirm-content {
        padding: 2vw;
    }


    @media (max-width: 480px) {
        .box-confirm .totalItemsAmount, .box-confirm .disDirection {
            font-size: 14pt;
        }
    }

</style>
