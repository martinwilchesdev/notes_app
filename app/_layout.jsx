import { Stack } from 'expo-router'

/**
 * Stack se utiliza cuando la aplicacion se compone de multiples paginas
 * Se crea una pila de paginas una sobre la otra
 */
const RootLayout = () => {
    // Layout raiz de la aplicacion
    // `screenOptions` permite definir estilos para en encabezado de la pagina
    return (
        <Stack
            screenOptions={{
                headerStyle: {
                    backgroundColor: '#ff8c00',
                },
                headerTintColor: '#fff',
                headerTitleStyle: {
                    fontSize: 20,
                    fontWeight: 'bold',
                },
                contentStyle: {
                    paddingHorizontal: 10,
                    paddingTop: 10,
                    backgroundColor: '#fff',
                },
            }}
        >
            <Stack.Screen name="index" options={{ title: 'Home' }} />

            {/* Personalizar el encabezado de la subpagina llamada `notes` */}
            <Stack.Screen name="notes" options={{ headerTitle: 'NOTES' }} />
        </Stack>
    )
}

export default RootLayout
