import { Text, View, StyleSheet, Image, TouchableOpacity } from 'react-native'
import { useRouter } from 'expo-router'

import PostIt from '@/assets/images/post-it.png'

const HomeScreen = () => {
    const router = useRouter()

    return (
        /**
         * `View` es el componente fundamental para la construccion de UI.
         * `View` es un contenedor que admite diseño con flexbox, manejo tactil y controles de accesibilidad.
         */
        <View style={styles.container}>
            {/* `Image` es un componente que permite mostrar una imagen referenciada mediante la propiedad `source` */}
            <Image source={PostIt} style={styles.image} />

            {/* Componente de texto */}
            <Text style={styles.title}>Welcome to notes app</Text>
            <Text style={styles.subtitle}>
                Capture your thoughts anytime, anywhere
            </Text>

            {/* `TouchableOpacity` es un componente que responde a las pulsaciones tactiles */}
            <TouchableOpacity
                style={styles.button}
                onPress={() => router.push('/notes')}
            >
                <Text style={styles.buttonText}>Get started</Text>
            </TouchableOpacity>
        </View>
    )
}

// Configuracion de estilos mediante StyleSheet
const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        padding: 20,
        backgroundColor: '#f8f9fa',
    },
    image: {
        width: 100,
        height: 100,
        marginBottom: 20,
        borderRadius: 10,
    },
    title: {
        fontSize: 28,
        fontWeight: 'bold',
        marginBottom: 10,
        color: '#333',
    },
    subtitle: {
        fontSize: 16,
        color: '#666',
        marginBottom: 20,
    },
    button: {
        backgroundColor: '#007bff',
        paddingVertical: 12,
        paddingHorizontal: 25,
        borderRadius: 8,
        alignItems: 'center'
    },
    buttonText: {
        color: '#fff',
        fontSize: 18,
        fontWeight: 'bold'
    }
})

export default HomeScreen
