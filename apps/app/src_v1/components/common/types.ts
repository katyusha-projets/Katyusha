import { Component } from 'vue'

export type StatusColors = 'blue' | 'azure' | 'indigo' | 'purple' | 'pink' | 'red' | 'orange' | 'yellow' | 'lime' | 'green' | 'teal' | 'cyan'

export interface DropdownMenuProps {
  title: string
  items: Array<{
    title: string
    icon: Component
  }>
}
