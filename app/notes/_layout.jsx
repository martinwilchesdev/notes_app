import { Stack } from 'expo-router'

const NoteLayout = () => {
    return (
        <Stack
            screenOptions={{
                headerShown: false, // Ocultar el encabezado de la pagina `index`
            }}
        />
    )
}

export default NoteLayout
