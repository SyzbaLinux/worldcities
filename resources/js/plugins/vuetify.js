import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import '@mdi/font/css/materialdesignicons.css';

const myCustomLightTheme = {
    dark: false,
    colors: {
        background: '#fafafa',
        surface: '#fafafa',
        primary: '#77080c',
        success: '#4CAF50',
        warning: '#FB8C00',
        accent: '#fdd922',
    }
}

export default createVuetify({
    theme: {
        defaultTheme: 'myCustomLightTheme',
        themes: {
            myCustomLightTheme,
        }
    }
})
