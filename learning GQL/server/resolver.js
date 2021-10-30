import {nanoid} from 'nanoid'

class Course{
	constructor(id, {
		courseName,category,price,language,email,stack,teachingAssits
	}){
		this.id = id
		this.courseName = courseName
		this.price = price
		this.language = language
		this.email = email
		this.stack= stack
		this.teachingAssits = teachingAssits
	}
}

const courseHolder = {}


const resolvers = {
	getCourse: ({ id }) => {
		return new Course(id,courseHolder[id]) 
	},
	createCourseL: ({input}) => {
		let id = nanoid()
		courseHolder[id] = input
		return new Course(id,input)
	} 
}

export default resolvers;