<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                v-for="(skill, index) in this.skills" :key="index"
                @click="selectSkill(skill.nombre, $event)"
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="isSelected(skill.nombre)"
            >{{ skill.nombre }}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default {
        props: [
            'skills',
            'oldskills',
        ],
        data(){
            return {
                selectedSkills: new Set(),
            }
        },
        created(){
            if(this.oldskills){
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => {
                    this.selectedSkills.add(skill)
                });
            }
        },
        mounted(){
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {

            selectSkill(skill, event){
                console.log(skill)
                if( event.target.classList.contains('bg-teal-400') ){
                    // If is active, we have to remove the class
                    event.target.classList.remove('bg-teal-400');
                    // Delete from set
                    this.selectedSkills.delete(skill);
                }else{
                    // If is inactive, we have to put the class
                    event.target.classList.add('bg-teal-400');
                    // Add to set
                    this.selectedSkills.add(skill);
                }

                const sendSkills = [...this.selectedSkills];
                document.querySelector('#skills').value = sendSkills;
            },

            isSelected(skill){
                return this.selectedSkills.has(skill) ? 'bg-teal-400' : '';
            }

        }
    }
</script>