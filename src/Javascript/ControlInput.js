export class ControlInput{

    constructor(){

    }

    static verifTaille(leMot, taille) {
        if(leMot.length >= taille ){
            return true;
        }else{
            return false
        }
    }

    static verifDispo(lesMots, leMot) {
        for (var k = 0; k < lesMots.length; k++) {
            if (lesMots[k] == leMot) {
                return false;
                k = lesMots.length;
        
            } else {
                return true
            }	
        }
    }

    static verifDispoAndTaille(lesMots, taille, leMot){
        return (this.verifDispo(lesMots, leMot) && this.verifTaille(leMot,taille));
    }
}