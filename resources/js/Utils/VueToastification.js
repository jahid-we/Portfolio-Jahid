import { useToast } from 'vue-toastification'

export function showSuccess(msg) {
  const toast = useToast()
  toast.success(msg)
}

export function showError(msg) {
  const toast = useToast()
  toast.error(msg)
}
