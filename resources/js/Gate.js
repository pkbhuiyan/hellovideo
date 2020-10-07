
export default class Gate {

    constructor(isLogin) {
        this.user = isLogin;   
    }


    // isAdmin() {
    //     return this.user.role === 'admin';
    // }

    // isUser() {
    //     return this.user.role === 'user';
    // }
    isLogin(){
        return this.user;
    }

    

}