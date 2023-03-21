<template>
    <div class="box1">
        <div class="box11">
            <a>
                <img src="picture/lock.png">
                <span>
                    contact
                </span>
            </a>
            <a>
                <img src="picture/lock.png">
                <span>
                    payment
                </span>
            </a>
            <a>
                <img src="picture/lock.png">
                <span>
                    personel informations
                </span>
            </a>
        </div>
        <div class="box12">
            <personelInformations/>
        </div>
    </div>
</template>

<script>
import contact from './contact';
import payment from './payment';
import personelInformations from './personelInformations';


export default {
    components: {
        contact, payment,personelInformations
    },
        props:{

        },
        mounted() {


        },
        data() {
        return {

        };
    }
    }
</script>
