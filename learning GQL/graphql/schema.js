import {BuildSchema} from 'graphql'

const schema = BuildSchema(`
	type Course {
		id: ID
		courseName : String
		category : String
		price: Int
		language: String
		email : String
		stack : stack
		teachingAssits = [TeachAssistInput]

	}

	type TeachAssist{
		 firstName : String
		 lastName : String
		 Experience : Int
	}

	enum stack {
		Web
		Mobile
		Other
	}


	type Query{
		getCourse(id: ID): Course
	}

	input CourseInput {
		id: ID
		courseName : String!
		category : String
		price: Int!
		language: String
		email : String
		stack : stack
		teachingAssits = [TeachAssist]!
	}

	input TeachAssistInput{
		firstName: String
		lastName: String
		Experience: int
	}

	type Mutation{
		CreateCourse(input: CourseInput) : Course
	}

`);



export default schema;